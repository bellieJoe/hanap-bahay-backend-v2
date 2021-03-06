<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "conversation_tbl";
    protected $primaryKey = "conversation_id";
    protected $guarded = [];
}
