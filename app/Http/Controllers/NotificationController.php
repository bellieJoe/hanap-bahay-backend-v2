<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public static function create(Request $req){
        Notification::create([
            'User_ID' => $req->uid,
            'Date_Notified' => $req->date,
            'Type' => $req->type,
            'Notification_Content' => $req->content,
            'Destination_Link' => $req->url,
            'Extra_ID' => $req->extraid
        ]);
    }

    public function getByUserID($userId){
        $notifications = Notification::where([
            'User_ID' => $userId
        ])
        ->orderBy('Date_Notified', 'desc')
        ->get();

        return json_encode($notifications);
    }

    public function delete(Request $req){
        Notification::where([
            'Notification_ID' => $req->notif_id
        ])
        ->delete();
    }

    public function markRead(Request $req){
        Notification::where([
            'Notification_ID' => $req->notif_id
        ])
        ->update([
            'Is_Read' => 1
        ]);
    }

    public function countNew($userId){
        $count = Notification::where([
            'User_ID' => $userId,
            'Is_Read' => 0
        ])->count();

        return json_encode($count);
    }
}
