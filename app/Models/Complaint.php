<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "complaint_tbl";
    protected $primaryKey = "complaint_id";
    protected $guarded = [];
}
