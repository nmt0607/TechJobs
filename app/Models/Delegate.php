<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

//use Laravel\Passport\HasApiTokens;

class Delegate extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasFactory;

    protected $table = 'delegate';
    protected $fillable = [
        'name',
        'code',
        'phone',
        'email',
        'position',
        'customer_id',
        'note',
    ];

    //query search
    protected $searchableByOrWhere = [
    ];

    public function getSearchableByOrWhere()
    {
        return $this->searchableByOrWhere;
    }


    protected $searchableByWhere = [
        'name',
        'code',
        'phone',
        'email',
        'position',
        'customer_id',
        'note',
    ];

    public function getSearchableByWhere()
    {
        return $this->searchableByWhere;
    }

// column table
    protected $columnTable = [
        'name',
        'code',
        'phone',
        'email',
        'position',
        'customer_id',
        'note',
    ];

    public function getColumnTable()
    {
        return $this->columnTable;
    }

//column sorting
    protected $columnSortingTable = [
        'name',
        'code',
        'phone',
        'email',
        'position',
        'customer_id',
        'note',
    ];

    public function getColumnSortingTable()
    {
        return $this->columnSortingTable;
    }


//export
    protected $columnExport = [
        'name',
        'code',
        'phone',
        'email',
        'position',
        'customer_id',
        'note',
    ];

    public function getColumnExport()
    {
        return $this->columnExport;
    }

// translate
    protected $translate = [
        'name' => 'Tên liên hệ',
        'phone' => 'Số điện thoại',
        'email' => 'Email',
        'position' => 'Chức vụ',
        'customer_id' => 'Khách hàng',
    ];

    public function getTranslate()
    {
        return $this->translate;
    }

    public function customers(){
        return $this->hasMany(Customer::class, 'delegate_id');
    }

    public function getCustomerName(){
        return implode(',', array_column($this->customers->toArray() , 'name'));
    }
}
