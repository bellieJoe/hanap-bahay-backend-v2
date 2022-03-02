<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantBoardedRRP extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tenant_boarded_rrp_tbl";
    protected $primaryKey = "tbr_id";
    protected $guarded = [];
}
