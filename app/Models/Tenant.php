<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = "tenant_tbl";
    // protected $primaryKey = "user_id";
    protected $guarded = [];
}
