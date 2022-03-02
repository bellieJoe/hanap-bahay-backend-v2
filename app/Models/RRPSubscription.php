<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RRPSubscription extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "rrp_subscription_tbl";
    protected $primaryKey = "subcription_id";
    protected $guarded = [];
}
