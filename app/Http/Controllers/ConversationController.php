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

    public function checkIfExist(Request $req){
        if($req->type == "tenant to rrp"){
            $conversation = Conversation::where([
                'Receiver_A' =>$req->idA,
                'RRP_ID' => $req->rrpid
            ])->get();

            return json_encode($conversation);

        } else if($req->type == "user to user") {
            $conversation = Conversation::where([
                'Receiver_A' => $req->idA,
                'Receiver_B' => $req->idB
            ])->get();

            if(!empty($conversation)){
                return json_encode($conversation);
            } else {
                $conversation = Conversation::where([
                    'Receiver_B' => $req->idA,
                    'Receiver_A' => $req->idB
                ])->get();

                return json_encode($conversation);
            }
        }
    }

    public function create(Request $req){
            Conversation::create([
                'Receiver_A' => $req->idA,
                'Receiver_B' => $req->idB,
                'Type' => $req->type,
                'RRP_ID' => $req->rrpid
            ]);
    }

    public function delete(Request $req){
        $conversation = Conversation::where([
            'Conversation_ID' => $req->convoid
        ]);
        $convId = $conversation->first()->Conversation_ID;

        $messages = Message::where([
            'Conversation_ID' => $convId
        ]);

        if($conversation->first()->Deleted_From == null) {
            $conversation->update([
                'Deleted_From' => $req->uid,
                'Deleted_From_Type' => $req->type
            ]);
            
            $messages->update([
                'Deleted_From' => $req->uid,
                'Deleted_From_Type' => $req->type
            ]);

        } else{
            if($conversation->first()->Deleted_From_Type == 'user' && $conversation->first()->Deleted_From != $req->uid){
                $conversation->delete();
                $messages->delete();
            }else{
                http_response_code(403);
            }
        }
    }

    public function checkNewMessageByUser($userId){
        $conversation = Conversation::where([
            'Receiver_A' => $userId
        ])
        ->orWhere([
            'Receiver_B' => $userId
        ])
        ->get();

        foreach($conversation as $convo){
            $unread = Message::where([
                'Is_Read' => 0,
                'Conversation_ID' => $convo->Conversation_ID,
                ['From_ID', '!=', $userId]
            ])->get();

            return empty($unread) ? false : true;
        }
    }

    public function checkNewMessageByRRP($rrpId){
        $conversation = Conversation::where([
            'RRP_ID' => $rrpId
        ])
        ->get();

        foreach($conversation as $convo){
            $unread = Message::where([
                'Is_Read' => 0,
                'Conversation_ID' => $convo->Conversation_ID,
                ['From_ID', '!=', $rrpId]
            ])->get();

            return empty($unread) ? false : true;
        }
    }

    public function countNewMessages($conversationId, $userId){
        $count = Message::where([
            'Conversation_ID' => $conversationId,
            'Is_Read' => 0,
            ['From_ID', '!=', $userId]
        ])->count();

        return json_encode(($count));
    }

    public function markRead(Request $req){
        Message::where([
            'Message_ID' => $req->messid
        ])
        ->update([
            'Is_Read' => 1
        ]);
    }
}
