<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

class PaymentHistoryController extends Controller
{
    public function addPayment(Request $req){
        PaymentHistory::create([
            'RRP_ID' => $req->RRP_ID,
            'Tenant_ID' => $req->Tenant_ID,
            'Tenant_Name' => $req->Tenant_Name,
            'Date_Paid' => $req->Date_Paid,
            'Status' => $req->Status,
            'Amount_Paid' => $req->Amount_Paid
        ]);
    }

    public function getPayments(Request $req){
        $payments = PaymentHistory::where([
            ['RRP_ID' , $req->rrpid],
            ['Date_Paid', 'like', $req->year.'-'.$req->month.'-%'],
        ])
        ->orderBy('Date_Paid', 'asc')->get();

        return json_encode($payments);
    }

    public function deletePayment($paymentId){
        PaymentHistory::where(['Payment_ID' => $paymentId])->delete();
    }

    public function getPayment($paymentId){
        $payment = PaymentHistory::where(['Payment_ID' => $paymentId])->get();

        return json_encode($payment);
    }

    public function updatePayment($paymentId, Request $req){
        PaymentHistory::where([
            'Payment_ID' => $paymentId
        ])
        ->update([
            'Date_Paid' => $req->Date_Paid,
            'Status' => $req->Status,
            'Amount_Paid' => $req->Amount_Paid
        ]);
    }
}
