<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //
    public function createAnnouncement(Request $req){
        Announcement::create([
            'Date_Created' => $req->Date_Created,
            'Annoucement_Title' => $req->Announcement_Title,
            'Announcement_Content' => $req->Announcement_Content,
            'RRP_ID' => $req->RRP_ID,
            'Announcement_Tag' => $req->Announcement_Tag,
            'Time_Created' => $req->Time_Created,
            'Date_Time' => $req->Date_Time
        ]);
    }

    public function getAnnouncementsRRPID($rrpId){
        $announcements = Announcement::where(
            ['RRP_ID' => $rrpId]
        )->get();

        return json_encode($announcements);
    }

    public function deleteAnnouncement($id){
        Announcement::where(
            ['Announcement_ID' => $id]
        )->delete();
    }


}
