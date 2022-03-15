<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function getComplaints($rrpId){
        $complaints = Complaint::where([
            'RRP_ID' => $rrpId
        ])
        ->orderBy('Complaint_Date', 'desc')
        ->get();

        return json_encode($complaints);
    }

    public function deleteComplaint(Request $req){

        $complaint = Complaint::where([
            'Complaint_ID' => $req->comid
        ]);

        $complaint->delete();

        $complaints = $this->getComplaints($req->rrpid);

        return json_encode($complaints);
    }

    public function create(Request $req){
        Complaint::create([
            'User_ID' => $req->uid,
            'RRP_ID' => $req->rrpid,
            'Complaint_Date' => $req->date,
            'Complaint_Content' => $req->content
        ]);
    }

    public function markRead(Request $req){
        Complaint::where([
            'Complaint_ID' => $req->com_id
        ]);
    }

    public function countComplaintsByRRP($rrpId){
        $count = Complaint::where([
            'RRP_ID' => $rrpId
        ])->count();

        return json_encode($count);
    }
}
