<?php

namespace App\Http\Controllers;

use App\Models\RRPType;
use App\Models\Tenant;
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

        $response = [];

        foreach ($rrpTypes as $rrpType) {
            $rrpType->Tenant_Count = Tenant::where([
                'RRP_Type_ID' => $rrpType->RRP_Type_ID
            ])
            ->count();
            array_push($response, $rrpType);
        }

        return $response;
    }

    public function getById($id){
        $rrpType = RRPType::where([
            'RRP_Type_ID' => $id
        ])->first();

        $rrpType->Tenant_Count = Tenant::where([
            'RRP_Type_ID' => $rrpType->RRP_Type_ID
        ])
        ->count();
        
        return $rrpType;
    }

    public function update(Request $req){
        RRPType::where([
            'RRP_Type_ID' => $req->RRP_Type_ID
        ])
        ->update([
            'RRP_Type' => $req->RRP_Type,
            'Basic_Rent' => $req->Basic_Rent,
            'Capacity' => $req->Capacity,
            'Description' => $req->Description,
            'Miscellaneous' => $req->Miscellaneous
        ]);
    }

    public function getRRPTypeAvailability($rrpTypeId){
        $tenantCount = Tenant::where([
            'RRP_Type_ID' => $rrpTypeId
        ])
        ->count();

        $RRPType = RRPType::where([
            'RRP_Type_ID' => $rrpTypeId
        ])->first();

        if($RRPType->capacity > $tenantCount){
            return "available";
        }
        else {
            return "unavailable";
        }
    }
}
