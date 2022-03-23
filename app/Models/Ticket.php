<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

//use Laravel\Passport\HasApiTokens;

class Ticket extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasFactory;

    protected $table = 'ticket';
    protected $fillable = [
        'require_code',
        'title',
        'require_id',
        'customer_id',
        'product_id',
        'status_type',
        'priority_type',
        'sla_id',
        'delegate_id',
        'type',
        'user_category_id',
        'user_id',
        'solution',
        'rate',
        'feedback',
    ];

    //query search
    protected $searchableByOrWhere = [
    ];

    public function getSearchableByOrWhere()
    {
        return $this->searchableByOrWhere;
    }


    protected $searchableByWhere = [
        'require_code',
        'title',
    ];

    public function getSearchableByWhere()
    {
        return $this->searchableByWhere;
    }

// column table
    protected $columnTable = [
        'require_code',
        'title',
        'require_id',
        'customer_id',
        'product_id',
        'status_type',
        'priority_type',
        'sla_id',
        'delegate_id',
        'type',
        'user_category_id',
        'user_id',
        'solution',
        'rate',
        'feedback',
    ];

    public function getColumnTable()
    {
        return $this->columnTable;
    }

//column sorting
    protected $columnSortingTable = [
        'require_code',
        'title',
        'require_id',
        'customer_id',
        'product_id',
        'status_type',
        'priority_type',
        'sla_id',
        'delegate_id',
        'type',
        'user_category_id',
        'user_id',
        'solution',
        'rate',
        'feedback',
    ];

    public function getColumnSortingTable()
    {
        return $this->columnSortingTable;
    }


//export
    protected $columnExport = [
        'require_code',
        'title',
        'require_id',
        'customer_id',
        'product_id',
        'status_type',
        'priority_type',
        'sla_id',
        'delegate_id',
        'type',
        'user_category_id',
        'user_id',
        'solution',
        'rate',
        'feedback',
    ];

    public function getColumnExport()
    {
        return $this->columnExport;
    }

// translate
    protected $translate = [
        'require_code'=>'Mã yêu cầu',
        'title'=>'Tiêu đề',
        'require_id',
        'customer_id',
        'product_id',
        'status_type'=>'Trạng thái',
        'priority_type'=>'Độ ưu tiên',
        'sla_id'=>'',
        'delegate_id',
        'type',
        'user_category_id',
        'user_id',
        'solution'=>'Giải pháp',
        'rate'=>'Đánh giá',
        'feedback'=>'Phản hồi',
    ];

    public function getTranslate()
    {
        return $this->translate;
    }


}
