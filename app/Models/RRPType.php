<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RRPType extends Model
{
    use HasFactory;

    protected $table = "rrp_type_tbl";
    protected $primaryKey = "RRP_Type_ID";
    protected $guarded = [];
}
