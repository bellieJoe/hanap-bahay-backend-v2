<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function(){
    Route::get('', function(){
        return User::get();
    });

    Route::post('', [UserController::class, 'createNewUser']);

    Route::get('unique-inputs', [UserController::class, 'getUserUniqueInputs']);

    Route::get('is-distinct', [UserController::class, 'isDistinct']);
    
    Route::prefix('{id}')->group(function(){
        Route::get('getFullName', [UserController::class, "getFullName"]);

        Route::post('create-user-profile', [UserController::class, 'createUserProfile']);
    });

    Route::prefix('{username}')->group(function(){
        Route::get('', [UserController::class, 'searchUser']);
    });

    Route::post('send-code', [UserController::class, 'sendVerificationCode']);

    Route::post('update-user-details-walkin',[UserController::class, 'updateUserDetails_Walkin']);


    
    
});

?>