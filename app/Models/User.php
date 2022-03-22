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
   protected $searchableByOrWhere = [
];
public function getSearchableByOrWhere(){
    return $this->searchableByOrWhere;
}    


protected $searchableByWhere = [
    'name',
    'account',
    'phone',
    'email',
    'sex'
];    
public function getSearchableByWhere(){
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
public function getColumnTable(){
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
public function getColumnSortingTable(){
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
public function  getColumnExport() {
    return $this->columnExport;
}

// translate
protected $translate = [
    'name'=>'Họ và tên',
    'account'=>'Tài khoản',
    'phone'=>'SĐT',
    'email'=>'Email',
    'date'=>'Ngày sinh',
    'sex'=>'Giới tính',
    'department'=>'Đơn vị'
];
public function getTranslate(){
    return $this->translate;
}
  
}
