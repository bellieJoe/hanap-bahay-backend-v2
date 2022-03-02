<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationUpdate extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "reservation_update_tbl";
    protected $primaryKey = "reservation_update_id";
    protected $guarded = [];
}
