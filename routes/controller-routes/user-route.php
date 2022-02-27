<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function(){
    Route::get('', function(){
        return null;
    });

    Route::get('unique-inputs', [UserController::class, 'getUserUniqueInputs']);

    Route::get('is-distinct', [UserController::class, 'isDistinct']);
    
    Route::prefix('{id}')->group(function(){
        Route::get('getFullName', [UserController::class, "getFullName"]);
    });
    
});

?>