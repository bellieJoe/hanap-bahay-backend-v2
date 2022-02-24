<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorReport extends Model
{
    use HasFactory;
    protected $table = "error_report_tbl";
    protected $primaryKey = "report_id";
    protected $guarded = [];
}
