<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('contacts')->group(function(){
    Route::post('create', [ContactController::class, 'create']);

    Route::get('get-contacts-rrpid/{rrpId}', [ContactController::class, 'getContactsRRPID']);

    Route::get('{id}', [ContactController::class, 'getContact']);

    Route::post('update/{id}', [ContactController::class, 'updateContact']);

    Route::post('delete/{id}/{rrpId}', [ContactController::class, 'deleteContact']);
});

?>