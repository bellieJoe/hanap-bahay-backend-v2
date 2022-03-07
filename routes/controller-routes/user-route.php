<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function(){
    Route::get('', function(){
        // return User::get();
    });

    Route::post('', [UserController::class, 'createNewUser']);

    Route::get('unique-inputs', [UserController::class, 'getUserUniqueInputs']);

    Route::get('is-distinct', [UserController::class, 'isDistinct']);
    
    Route::prefix('{id}')->group(function(){

        Route::get('', [UserController::class, 'getUserDetails']);

        Route::get('getFullName', [UserController::class, "getFullName"]);

        Route::post('update', [UserController::class, 'updateUser']);

        Route::post('create-user-profile', [UserController::class, 'createUserProfile']);

        Route::post('auth', [UserController::class, 'confirmPassword']);

        Route::post('change-password', [UserController::class, 'changePassword']);

        Route::post('update-privacy', [UserController::class, 'updatePrivacy']);

        Route::get('tenant-info', [UserController::class, 'getTenantInfo']);
    });

    Route::prefix('{username}')->group(function(){
        Route::get('', [UserController::class, 'searchUser']);
    });

    Route::post('send-code', [UserController::class, 'sendVerificationCode']);

    Route::post('update-user-details-walkin',[UserController::class, 'updateUserDetails_Walkin']);

    Route::prefix('search')->group(function(){
        Route::get('tenant-firstname', [UserController::class, 'searchTenantFirstname']);

        Route::get('tenant-2name', [UserController::class, 'searchTenant2Name']);

        Route::get('tenant-3name', [UserController::class, 'searchTenant3Name']);

        Route::get('tenant-4name', [UserController::class, 'searchTenant4Name']);
    });

    Route::get('email/check-registered-email', [UserController::class, 'checkIfRegisteredEmail']);

    Route::post('email/send-tenant-verification', [UserController::class, 'sendTenantVerificationMail']);

    Route::post('register-tenant', [UserController::class, 'registerTenant']);
});
?>