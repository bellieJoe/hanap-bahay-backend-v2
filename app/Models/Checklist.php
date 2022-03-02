<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "checklist_tbl";
    protected $primaryKey = "checklist_id";
    protected $guarded = [];
}
