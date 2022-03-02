<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "reservation_tbl";
    protected $primaryKey = "reservation_id";
    protected $guarded = [];
}
