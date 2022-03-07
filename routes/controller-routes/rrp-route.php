<?php

use App\Http\Controllers\RRPController;
use Illuminate\Support\Facades\Route;

Route::prefix('rrps')->group(function(){
    Route::prefix('{ownerId}')->group(function(){
        Route::post('', [RRPController::class, 'addNewRH']);
    });

    Route::get('get-rrp/{rrpId}', [RRPController::class,'getRRP']);

    Route::get('compute-availability/{rrpId}', [RRPController::class, 'computeAvailability']);

    Route::post('update/rrp', [RRPController::class, 'updateRRP']);

    Route::post('delete/{rrpId}', [RRPController::class, 'delete']);

    Route::get('get-rrps', [RRPController::class, 'getRRPs']);
});

?>