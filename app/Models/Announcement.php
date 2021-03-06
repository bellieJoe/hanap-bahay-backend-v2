<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "announcement_tbl";
    protected $primaryKey = "announcement_id";
    protected $guarded = [];
    protected $appends = ['Announcement_Title'];

    protected function getAnnouncementTitleAttribute(){
        return $this->attributes['Annoucement_Title'];
    }
}
