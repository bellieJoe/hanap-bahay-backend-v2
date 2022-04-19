<?php

namespace App\Http\Controllers;

use App\Models\RRPBilling;
use Illuminate\Http\Request;

class RRPBillingController extends Controller
{
    public function getInvoicesByRRP_ID($rrpId, Request $req){
        if($req->Month && $req->Year) {

            $Invoices = RRPBilling::where([
                'RRP_ID' => $rrpId
            ])
            ->whereMonth('created_at', $req->Month)
            ->whereYear('created_at', $req->Year)
            ->get();

            return $Invoices;
        }
        else {
            return json_encode([]);
        }
    }

    public function getInvoiceByID($id) {
        $Invoice = RRPBilling::where([
            'ID' => $id
        ])
        ->first();

        return $Invoice;
    }
}
