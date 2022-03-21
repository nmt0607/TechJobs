<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    // create, update column
    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    //query search
    protected $searchableByOrWhere = [
    ];
    public function getSearchableByOrWhere(){
        return $this->searchableByOrWhere;
    }    
    

    protected $searchableByWhere = [
        'name',
        'phone',
        'email',
    ];    
    public function getSearchableByWhere(){
        return $this->searchableByWhere;
    } 

    // column table
    protected $columnTable = [
        'name',
        'phone',
        'email',
    ];    
    public function getColumnTable(){
        return $this->columnTable;
    } 
    //column sorting
    protected $columnSortingTable = [
        'name',
        'phone',
        'email',
    ];    
    public function getColumnSortingTable(){
        return $this->columnSortingTable;
    } 

    
    //export
    protected $columnExport = [
        'name',
        'phone',
        'email',
    ];  
    public function  getColumnExport() {
        return $this->columnExport;
    }

    // translate
    protected $translate = [
        'name' => 'Tên khách hàng',
        'phone' => 'Số điện thoại',
        'email' => 'Email',
        
    ];
    public function getTranslate(){
        return $this->translate;
    }
}
