<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Company;
use App\Models\User;

class Job extends Model
{
    protected $fillable = [
        'title',
        'number',
        'gender',
        'description',
        'requirement',
        'level',
        'experience',
        'salary',
        'benefit',
        'type',
        'address_id',
        'end_date',
        'user_id',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'applications')->withPivot('status', 'offer')->withTimestamps();
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images()
    {
        return $this->hasManyThrough(Image::class, Company::class, 'id', 'imageable_id', 'company_id', 'id');
    }

    public static function listCompany()
    {
        $query = Job::query();
        $listCompanyId = $query->groupBy('user_id')->pluck('user_id')->toArray();
        return User::whereIn('id', $listCompanyId)->get();
    }
}
