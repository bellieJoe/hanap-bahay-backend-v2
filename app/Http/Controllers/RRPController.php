<?php

namespace App\Http\Controllers;

use App\Models\RRP;
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
}
