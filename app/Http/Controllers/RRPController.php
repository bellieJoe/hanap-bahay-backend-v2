<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Complaint;
use App\Models\Contact;
use App\Models\PaymentHistory;
use App\Models\Rating;
use App\Models\RRP;
use App\Models\Tenant;
use Illuminate\Http\Request;

class RRPController extends Controller
{
    //
    public function addNewRh(Request $request, $ownerId){
        RRP::create([
            'RRP_Name' => $request->input('RRP_Name'),
            'RRP_Address' => $request->input('RRP_Address'),
            'RRP_X_Coordinates' => $request->input('RRP_X_Coordinates'),
            'RRP_Y_Coordinates' => $request->input('RRP_Y_Coordinates'),
            'Owner_ID' => $ownerId,
            'Contact_Number' => $request->input('Contact_Number'),
            'RRP_Settings' => $request->input('RRP_Settings'),
            'Photo_Documents' => $request->input('Photo_Documents')
        ]);
    }

    public function getRRP($rrpId){
        $rrp = RRP::where(['RRP_ID' => $rrpId])->get();

        return json_encode($rrp);
    }

    public function computeAvailability($rrpId){
        $rrp = RRP::where(
            ['RRP_ID' => $rrpId]
        )->first();

        $tenantCount = Tenant::where([
            'RRP_ID' => $rrpId
        ])->count();

        $availability = $rrp->RRP_Capacity - $tenantCount;

        return $availability;
    }

    public function updateRRP(Request $req){
        RRP::where([
            'RRP_ID' => $req->RRP_ID,
            'Owner_ID' => (int)$req->Owner_ID
        ])
        ->update([
            'RRP_Name' => $req->RRP_Name,
            'RRP_Description' => $req->RRP_Description,
            'RRP_Capacity' => $req->RRP_Capacity,
            'RRP_Type' => $req->RRP_Type,
            'RRP_Address' => $req->RRP_Address,
            'RRP_Rent_Rate' => $req->RRP_Rent_Rate,
            'RRP_X_Coordinates' => $req->RRP_X_Coordinates,
            'RRP_Y_Coordinates' => $req->RRP_Y_Coordinates,
            'Contact_Number' => $req->Contact_Number
        ]);
    }

    public function delete($rrpId){
        RRP::where(['RRP_ID' => $rrpId])->delete();
        Tenant::where(['RRP_ID' => $rrpId])->delete();
        Rating::where(['RRP_ID' => $rrpId])->delete();
        PaymentHistory::where(['RRP_ID' => $rrpId])->delete();
        Announcement::where(['RRP_ID' => $rrpId])->delete();
        Contact::where(['RRP_ID' => $rrpId])->delete();
        Complaint::where(['RRP_ID' => $rrpId])->delete();
    }

    public function getRRPs(){
        $rrps = RRP::all()->orderBy('RRP_ID', 'asc');

        return json_encode($rrps);
    }
}
