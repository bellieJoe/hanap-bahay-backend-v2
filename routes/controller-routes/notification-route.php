<?php

use App\Http\Controllers\NotificationController;
use App\Models\Notification;
use Illuminate\Support\Facades\Route;

Route::prefix('notifications')->group(function(){
    Route::post('create', [NotificationController::class, 'create']);

    Route::get('userid/{userId}', [NotificationController::class, 'getByUserID']);

    Route::post('delete', [NotificationController::class, 'delete']);

    Route::post('mark-read', [NotificationController::class, 'markRead']);

    Route::get('count-new/{userId}', [NotificationController::class, 'countNew']);
});

?>