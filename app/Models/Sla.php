<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sla extends Model
{
    use HasFactory;
    protected $table = 'sla';
    protected $fillable = ['type','process_time_json'];
}
