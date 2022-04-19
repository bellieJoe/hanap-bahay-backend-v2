<?php

use App\Http\Controllers\RRPBillingController;
use Illuminate\Support\Facades\Route;

Route::prefix('invoices')->group(function(){

    Route::get('get-by-rrpid/{rrpId}', [RRPBillingController::class, 'getInvoicesByRRP_ID']);

    Route::get('get-by-id/{id}', [RRPBillingController::class, 'getInvoiceByID']);

});

?>

