<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function addChecklist(Request $req){
        Checklist::create([
            'User_ID' => $req->uid,
            'RRP_ID' => $req->rrpid
        ]);
    }

    public function isListed($userID, $rrpId){
        $checklist = Checklist::where([
            'User_ID' => $userID,
            'RRP_ID' =>$rrpId
        ])->get();

        return json_encode($checklist);
    }

    public function getChecklists($userId){
        $checklist = Checklist::where([
            'User_ID' => $userId
        ])->get();

        return json_encode($checklist);
    }

    public function checkList(Request $req){
        Checklist::where([
            'Checklist_Id' => $req->chid
        ])
        ->update([
            'Check_Status' => $req->val
        ]);
    }

    public function delete(Request $req){
        Checklist::where([
            'Checklist_Id' => $req->chid
        ])->delete();

    }
}
