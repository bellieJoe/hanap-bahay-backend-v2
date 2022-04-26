<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RRPBilling extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "rrp_billing_tbl";
    protected $primaryKey = "Bill_ID";

}
