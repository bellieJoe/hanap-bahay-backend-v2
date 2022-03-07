<?php

namespace App\Http\Controllers;

use App\Models\TenantBoardedRRP;
use Illuminate\Http\Request;

class TenantBoardedRRPController extends Controller
{
    //
    public function addBoardedRRP(Request $req){
        TenantBoardedRRP::create([
            'Tenant_ID' => $req->input('uid'),
            'RRP_ID' => $req->input('rrpid')
        ]);
    }

    public function getTenant($tenantId, $rrpId){
        $tenant = TenantBoardedRRP::where([
            'RRP_ID' => $rrpId,
            'Tenant_ID' => $tenantId
        ])->get();

        // return json_encode([$rrpId, $tenantId]);
        return json_encode($tenant);
    }
}
