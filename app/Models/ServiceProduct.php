<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sla;

class ServiceProduct extends Model
{
    use HasFactory;
    protected $table = 'service_product';
    // create, update column
    protected $fillable = [
        'name',
        'status',
        'category_id',
        'user_id',
        'rate',
        'description'
    ];

    //query search
    protected $searchableByOrWhere = [
    ];
    public function getSearchableByOrWhere(){
        return $this->searchableByOrWhere;
    }    
    

    protected $searchableByWhere = [
        'name',
    ];    
    public function getSearchableByWhere(){
        return $this->searchableByWhere;
    } 

    // column table
    protected $columnTable = [
        'name',
        'rate',
        'category_id',
        'user_id',
        'created_at',
        'updated_at',
    ];    
    public function getColumnTable(){
        return $this->columnTable;
    } 
    //column sorting
    protected $columnSortingTable = [
        'name',
        'rate',
        'category_id',
        'user_id',
        'created_at',
        'updated_at',
    ];    
    public function getColumnSortingTable(){
        return $this->columnSortingTable;
    } 

    
    //export
    protected $columnExport = [
        'name',
        'status',
        'category_id',
        'user_id',
        'rate',
        'description',
    ];  
    public function  getColumnExport() {
        return $this->columnExport;
    }
    // translate
    protected $translate = [
        'name' => 'Tên sản phẩm',
        'status' => 'Trạng thái',
        'category_id' => 'Danh mục',
        'user_id' => 'Người quản lý',
        'rate'=> 'Thang điểm',
        'description'=> 'Mô tả',
    ];

    public function getTranslate(){
        return $this->translate;
    }

    public function sla(){
        return $this->belongsTo(Sla::class, 'sla_id');
    }
}
