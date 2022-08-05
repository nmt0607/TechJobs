<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

//use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    //use HasFactory, Notifiable, HasRoles, HasApiTokens, SoftDeletes;
    use HasFactory, Notifiable, HasRoles, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'account',
        'phone',
        'email',
        'date',
        'sex',
        'department',
        'password',
        'type',
        'image',
        'level',
        'province_id',
        'type_job',
        'size',
        'description'
    ];

    //query search
    protected $searchableByOrWhere = [];
    public function getSearchableByOrWhere()
    {
        return $this->searchableByOrWhere;
    }


    protected $searchableByWhere = [
        'name',
        'account',
        'phone',
        'email',
        'sex'
    ];
    public function getSearchableByWhere()
    {
        return $this->searchableByWhere;
    }

    // column table
    protected $columnTable = [
        'name',
        'account',
        'phone',
        'email',
        'date',
        'sex',
        'department'
    ];
    public function getColumnTable()
    {
        return $this->columnTable;
    }
    //column sorting
    protected $columnSortingTable = [
        'name',
        'account',
        'phone',
        'email',
        'date',
        'sex',
        'department'
    ];
    public function getColumnSortingTable()
    {
        return $this->columnSortingTable;
    }


    //export
    protected $columnExport = [
        'name',
        'phone',
        'email',
        'date',
        'sex',
        'password',
        'level',
        'exp',
        'type',
        'status',
        'type_job',
        'salary',
        'province_id',
        'address',
    ];
    public function  getColumnExport()
    {
        return $this->columnExport;
    }

    // translate
    protected $translate = [
        'name' => 'Họ và tên',
        'account' => 'Tài khoản',
        'phone' => 'SĐT',
        'email' => 'Email',
        'date' => 'Ngày sinh',
        'sex' => 'Giới tính',
        'department' => 'Đơn vị'
    ];
    public function getTranslate()
    {
        return $this->translate;
    }

    public function categories()
    {
        return $this->belongsToMany(UserCategory::class, 'user_category_has_user', 'user_id', 'category_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'applications')->withPivot('status', 'offer')->withTimestamps();
    }

    public function jobsCreate()
    {
        return $this->hasMany(Job::class);
    }

    public function jobApplying()
    {
        return $this->belongsToMany(Job::class, 'applications')->where('applications.status', 1)->withPivot('status', 'offer')->withTimestamps();
    }

    public function jobFinish()
    {
        return $this->belongsToMany(Job::class, 'applications')->where('applications.status', 4)->withPivot('status', 'offer')->withTimestamps();
    }

    public function conversation($partnerId)
    {
        $query = Message::query();
        $query->where(function ($query) use ($partnerId) {
            $query->where('from_id', auth()->id());
            $query->where('to_id', $partnerId);
        })->orWhere(function ($query) use ($partnerId) {
            $query->where('to_id', auth()->id());
            $query->where('from_id', $partnerId);
        });
        return $query->get();
    }

    public function friend()
    {
        if (auth()->user()->type == 2) {
            $listJobAppliedIds = auth()->user()->jobs->pluck('user_id')->toArray();
            $listFriendId = [];
            foreach ($listJobAppliedIds as $id) {
                $listFriendId[] = $id;
            }
            $listFriend = User::whereIn('id', array_unique($listFriendId))->get();
            return $listFriend;
        } else {
            $id = auth()->id();
            $jobs = Job::where('user_id', $id)->get();
            $listFriendId = [];
            foreach ($jobs as $job) {
                $users = $job->users()->whereIn('applications.status', [2, 3, 4])->get();
                foreach ($users as $user) {
                    $listFriendId[] = $user->id;
                }
            }
            $listFriend = User::whereIn('id', array_unique($listFriendId))->get();
            return $listFriend;
        }
    }

    public function friendChat()
    {
        $friendChatId1 = Message::where('from_id', auth()->id())->select('to_id as id', 'created_at')->get()->toArray();
        $friendChatId2 = Message::where('to_id', auth()->id())->select('from_id as id', 'created_at')->get()->toArray();
        $friendChatId = array_merge($friendChatId1, $friendChatId2);
        $date = array_column($friendChatId, 'created_at');
        array_multisort($date, SORT_DESC, $friendChatId);
        $friendChatId = array_column($friendChatId, 'id');
        $friendChatId = array_values(array_unique($friendChatId));
        $ids_ordered = implode(',', $friendChatId);
        $friendChat = User::whereIn('id', $friendChatId)->orderByRaw("FIELD(id, $ids_ordered)")->get();
        return $friendChat;
    }

    public function lastMessage($partnerId)
    {
        $query = Message::query();
        $query->where(function ($query) use ($partnerId) {
            $query->where('from_id', auth()->id());
            $query->where('to_id', $partnerId);
        })->orWhere(function ($query) use ($partnerId) {
            $query->where('to_id', auth()->id());
            $query->where('from_id', $partnerId);
        })->orderBy('created_at', 'desc');
        $msg = $query->first();
        if($msg && $msg->from_id == auth()->id())
        {
            return 'Bạn: '.$msg->content;
        }
        return $msg->content??'';
    }

    public function lastMessageTimeDiff($partnerId)
    {
        $query = Message::query();
        $query->where(function ($query) use ($partnerId) {
            $query->where('from_id', auth()->id());
            $query->where('to_id', $partnerId);
        })->orWhere(function ($query) use ($partnerId) {
            $query->where('to_id', auth()->id());
            $query->where('from_id', $partnerId);
        })->orderBy('created_at', 'desc');
        return $query->first()?$query->first()->created_at->diffForHumans():'';
    }

    public function lastMessageTime($partnerId)
    {
        $query = Message::query();
        $query->where(function ($query) use ($partnerId) {
            $query->where('from_id', auth()->id());
            $query->where('to_id', $partnerId);
        })->orWhere(function ($query) use ($partnerId) {
            $query->where('to_id', auth()->id());
            $query->where('from_id', $partnerId);
        })->orderBy('created_at', 'desc');
        return $query->first()?$query->first()->created_at->format('H:i'):'';
    }

    public function countUnseenMsg($id)
    {
        return auth()->user()->unreadNotifications()->where('type', 'App\Notifications\MessageNotification')->where('data', 'like', '%"fromId":' . $id . '%')->count();
    }

    public function listTag(){
        $listTagString = '';
        foreach($this->tags as $tag){
            $listTagString = $listTagString.$tag->name.', ';
        }
        return substr($listTagString, 0, -2);                                           
    }

    public function countApplyingUser(){
        $count = 0;
        foreach($this->jobsCreate as $job){
            $count += $job->applyingUser()->count();
        }
        return $count;
    }

    public function rate(){
        $rate = Rate::where('to_id', $this->id)->avg('rate')??0;
        return $rate;
    }

    public function rateCount(){
        return Rate::where('to_id', $this->id)->count();
    }
}
