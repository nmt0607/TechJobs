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
        'department'
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
        'account',
        'phone',
        'email',
        'date',
        'sex',
        'department'
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
        return $this->belongsToMany(Job::class, 'applications')->withPivot('status')->withTimestamps();
    }

    public function conversation($partnerId){
        $query = Message::query();
        $query->where(function($query) use ($partnerId){
            $query->where('from_id', auth()->id());
            $query->where('to_id', $partnerId);
        })->orWhere(function($query) use ($partnerId){
            $query->where('to_id', auth()->id());
            $query->where('from_id', $partnerId);
        });
        return $query->get();
    }

    public function friend(){
        $listJobAppliedIds = auth()->user()->jobs->pluck('user_id')->toArray();
        $listFriendId = [];
        foreach($listJobAppliedIds as $id){
            $listFriendId[] = $id;
        }
        $listFriend = User::whereIn('id', array_unique($listFriendId))->get();
        return $listFriend;
    }
}
