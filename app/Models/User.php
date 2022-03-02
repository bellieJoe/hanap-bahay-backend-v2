<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = "user_tbl";
    protected $primaryKey = "user_list_id";
    protected $guarded = [];
    protected $appends = ['User_ID', 'User_Type'];

    protected function getUserIDAttribute()  {
        return $this->attributes['User_List_ID'];
    }
    protected function getUserTypeAttribute()  {
        return $this->attributes['User_type'];
    }
}
