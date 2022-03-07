<?php

use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('profiles')->group(function(){
    Route::prefix('{userId}')->group(function(){
        Route::get('', [UserProfileController::class, 'getUserProfile']);

        Route::post('update', [UserProfileController::class, 'updateUserProfile']);
    });
});

?>