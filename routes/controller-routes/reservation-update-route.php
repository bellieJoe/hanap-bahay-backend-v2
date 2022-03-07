<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationUpdateController;
use Illuminate\Support\Facades\Route;

Route::prefix('reservation-updates')->group(function(){
    Route::get('get-updates/{reservationId}', [ReservationUpdateController::class, 'getUpdates']);

    Route::post('confirm-reservation', [ReservationUpdateController::class, 'confirmReservation']);
    
    Route::post('decline-reservation', [ReservationUpdateController::class, 'declineReservation']);

    Route::post('update-reservation', [ReservationUpdateController::class, 'addUpdate']);
});

?>