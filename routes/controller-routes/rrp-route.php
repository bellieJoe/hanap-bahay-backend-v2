<?php

use App\Http\Controllers\RRPController;
use Illuminate\Support\Facades\Route;

Route::prefix('rrps')->group(function(){
    Route::prefix('{ownerId}')->group(function(){
        Route::post('', [RRPController::class, 'addNewRH']);
    });
});

?>