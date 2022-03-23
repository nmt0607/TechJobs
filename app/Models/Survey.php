<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'survey';
    protected $fillable = [
        'name',
        'type',
        'content',
        'rate',
        'admin_id',
        'status'
    ];
    //query search
    protected $searchableByOrWhere = [
    ];
    public function getSearchableByOrWhere(){
        return $this->searchableByOrWhere;
    }    
    

    protected $searchableByWhere = [
        'name',
        'type'
    ];    
    public function getSearchableByWhere(){
        return $this->searchableByWhere;
    } 

    // column table
    protected $columnTable = [
        'name',
        'type'
    ];    
    public function getColumnTable(){
        return $this->columnTable;
    } 
    //column sorting
    protected $columnSortingTable = [
        'name',
        'type'
    ];    
    public function getColumnSortingTable(){
        return $this->columnSortingTable;
    } 

    
    //export
    protected $columnExport = [
        'name',
        'type'
    ];  
    public function  getColumnExport() {
        return $this->columnExport;
    }

    // translate
    protected $translate = [
        'name' => 'Tên khảo sát',
        'type' => 'Loại khảo sát',
    ];
    public function getTranslate(){
        return $this->translate;
    }
}
