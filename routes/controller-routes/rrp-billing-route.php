<?php

use App\Http\Controllers\RRPBillingController;
use Illuminate\Support\Facades\Route;

Route::prefix('invoices')->group(function(){

    Route::get('get-by-rrpid/{rrpId}', [RRPBillingController::class, 'getInvoicesByRRP_ID']);

    Route::get('get-by-user_id/{user_id}', [RRPBillingController::class, 'getInvoicesByUser_ID']);

    Route::get('get-by-id/{id}', [RRPBillingController::class, 'getInvoiceByID']);

    Route::post('update-status', [RRPBillingController::class, 'updateStatus']);

    Route::post('update-payment', [RRPBillingController::class, 'updatePayment']);

});

?>

