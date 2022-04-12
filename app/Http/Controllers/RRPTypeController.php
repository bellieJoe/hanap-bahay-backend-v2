<?php

namespace App\Http\Controllers;

use App\Models\RRPType;
use Illuminate\Http\Request;

class RRPTypeController extends Controller
{
    public function countRRPTypes($rrpId) {
        $count = RRPType::where([
            'RRP_ID' => $rrpId
        ])->count();

        return json_encode($count);
    }   

    public function create(Request $req) {
        RRPType::create([
            'RRP_ID' => $req->RRP_ID,
            'RRP_Type' => $req->RRP_Type,
            'Basic_Rent' => $req->Basic_Rent,
            'Capacity' => $req->Capacity,
            'Description' => $req->Description,
            'Miscellaneous' => $req->Miscellaneous
        ]);
    }

    public function getByRRP_ID($rrpId){
        $rrpTypes = RRPType::where([
            'RRP_ID' => $rrpId
        ])->get();

        return $rrpTypes;
    }
}
