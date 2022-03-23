<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    // create, update column
    protected $fillable = [
        'name',
        'address',
        'province_id',
        'district_id',
        'parent_id',
        'number_of_staffs',
    ];

    //query search
    protected $searchableByOrWhere = [
    ];
    public function getSearchableByOrWhere(){
        return $this->searchableByOrWhere;
    }    
    

    protected $searchableByWhere = [
        'name',
        'address',
    ];    
    public function getSearchableByWhere(){
        return $this->searchableByWhere;
    } 

    // column table
    protected $columnTable = [
        'name',
        'address',
        'province_id',
        'district_id',
        'parent_id',
        'number_of_staffs',
    ];    
    public function getColumnTable(){
        return $this->columnTable;
    } 
    //column sorting
    protected $columnSortingTable = [
        'name',
        'address',
        'province_id',
        'district_id',
        'parent_id',
        'number_of_staffs',
    ];    
    public function getColumnSortingTable(){
        return $this->columnSortingTable;
    } 

    
    //export
    protected $columnExport = [
        'name',
        'address',
        'province_id',
        'district_id',
        'parent_id',
        'number_of_staffs',
    ];  
    public function  getColumnExport() {
        return $this->columnExport;
    }

    // translate
    protected $translate = [
        'name' => 'Tên đơn vị',
        'address' => 'Địa chỉ',
        'province_id' => 'Tỉnh',
        'district_id' => 'Huyện',
        'parent_id'=> 'Đơn vị cấp trên',
        'number_of_staffs'=> 'Số nhân sự',
    ];
    public function getTranslate(){
        return $this->translate;
    }

    public static function tree()
    {
        $getAll = Unit::get();
        $rootId = Unit::query()->where('parent_id',0)->get();
        // dd($rootId->get());
        foreach($rootId as $root)
        {
            $root->children = $getAll->where('parent_id',$root->id);
        }
        return $rootId;
    }
}
