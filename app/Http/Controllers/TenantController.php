<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    //
    public function getTenants($rrpId){
        $tenants = Tenant::where([
            'RRP_ID' => $rrpId
        ])
        ->get();

        return json_encode($tenants);
    }

    public function addTenant(Request $req){
        Tenant::create([
            'User_ID' => $req->input('id'), 
            'RRP_ID' => $req->input('rrpid'),
            'Date_Added' => $req->input('date'), 
            `Time_Added` => $req->input('time')
        ]);

        User::where([
            'User_List_ID' => $req->input('id')
        ])
        ->update([
            'Is_Boarded' => 1
        ]);
    }

    public function deleteTenant(Request $req){
        Tenant::where(['User_ID' => $req->input('id')])
        ->delete();

        User::where(['User_List_ID' => $req->input('id')])
        ->update(['Is_Boarded' => 0]);
    }

    public function countTenant($rrpId){
        $tenantCount = Tenant::where([
            'RRP_ID' => $rrpId
        ])->count();

        return json_encode($tenantCount);
    }   

    public function unboardTenants(Request $req){
        $tenants = Tenant::where([
            'RRP_ID' => $req->rrpid    
        ])->get()->pluck('User_ID');

        foreach($tenants as $tenant){
            User::where([
                'User_List_ID' => $tenant
            ])
            ->update([
                'Is_Boarded' => 0
            ]);
        }
    }

    public function getTenantByUserId($userId){
        $tenants = Tenant::where([
            'User_ID' => $userId
        ])->get();

        return json_encode($tenants);
    }

}
