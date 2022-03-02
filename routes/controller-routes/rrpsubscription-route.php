<?php

use App\Http\Controllers\RRPSubscriptionController;
use App\Models\RRPSubscription;
use Illuminate\Support\Facades\Route;

Route::prefix('rrpsubscriptions')->group(function(){

    Route::prefix('{userId}')->group(function(){
        Route::post('', [RRPSubscriptionController::class, 'addRHSubscription']);
    });
    
});

?>