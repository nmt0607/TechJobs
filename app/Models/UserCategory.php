<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UserCategory extends Model implements Auditable
{
    use HasFactory;
    // create, update column
    use \OwenIt\Auditing\Auditable;
    protected $table = "user_category";
    protected $fillable = [
        'name',
        'description',
    ];

    //query search
    protected $searchableByOrWhere = [
        'name',
        'description'
    ];
    public function getSearchableByOrWhere(){
        return $this->searchableByOrWhere;
    }

    protected $searchableByWhere = [
        'name',
        'description'
    ];
    public function getSearchableByWhere(){
        return $this->searchableByWhere;
    }

    // column table
    protected $columnTable = [
        'name',
        'description',
    ];
    public function getColumnTable(){
        return $this->columnTable;
    }

    //column sorting
    protected $columnSortingTable = [
        'name',
        'description'
    ];
    public function getColumnSortingTable(){
        return $this->columnSortingTable;
    }

    //export
    protected $columnExport = [];
    public function  getColumnExport() {
        return $this->columnExport;
    }

    protected $translate = [
        'name' => 'Tên nhóm người dùng',
        'description' => 'Mô tả'
    ];
    public function getTranslate(){
        return $this->translate;
    }

    public function users() {
        return $this->belongsToMany(User::class, 'user_category_has_user');
    }

    // public function roles() {
    //     return $this->belongsToMany(Role::class, 'user_category_has_role');
    // }
}
