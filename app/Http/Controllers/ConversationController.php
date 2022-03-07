<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    //
    public function getRRPConversation($rrpId){

        $convo = Conversation::where([
            'RRP_ID' => $rrpId,
        ])
        ->orderBy('Last_Edited', 'desc')->get();

        $resConvo = $convo->map(function($item, $key){
            $count = Message::where([
                'Conversation_ID' => $item->Conversation_ID
            ])->count();

            if($count > 0){
                return $item;
            }
        });

        return json_encode($resConvo);

    }

    public function getConversation($conversationId){
        $convo = Conversation::where([
            'Conversation_ID' => $conversationId
        ])
        ->get();

        return json_encode($convo);
    }
}
