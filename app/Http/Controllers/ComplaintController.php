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
}
