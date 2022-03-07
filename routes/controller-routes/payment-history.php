<?php

use App\Http\Controllers\PaymentHistoryController;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Route;

Route::prefix('payment-history')->group(function(){
    Route::post('add', [PaymentHistoryController::class, 'addPayment']);

    Route::get('get-payments', [PaymentHistoryController::class, 'getPayments']);

    Route::post('delete/{paymentId}', [PaymentHistoryController::class, 'deletePayment']);

    Route::get('get-payment/{paymentId}', [PaymentHistoryController::class, 'getPayment']);

    Route::post('update-payment/{paymentId}', [PaymentHistoryController::class, 'updatePayment']);
});

?>