<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function addMessage(Request $req){
         Message::create([
             'Conversation_ID' => $req->convoid,
             'From_ID' => $req->from,
             'Message_Content' => $req->content,
             'Date_Sent' => $req->date
         ]);

         Conversation::where([
             'Conversation_ID' => $req->convoid
         ])
         ->update([
             'height' => $req->height,
             'Last_Edited' => $req->date
         ]);
    }

    public function fetchMessagesByConversation($conversationId){
        $messages = Message::where([
            'Conversation_ID' => $conversationId
        ])->get();
        return json_encode($messages);
    }

    public function getConversationHeight($conversationId){
        $height = Conversation::where([
            'Conversation_ID' => $conversationId
        ])
        ->pluck('height')
        ->first();

        return json_encode($height);
    }
}
