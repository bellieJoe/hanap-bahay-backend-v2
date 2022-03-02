<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "payment_history_tbl";
    protected $primaryKey = "payment_id";
    protected $guarded = [];
}
