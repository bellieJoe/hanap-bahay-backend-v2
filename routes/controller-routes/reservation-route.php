<?php

use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::prefix('reservations')->group(function(){
    Route::post('create', [ReservationController::class, 'addReservation']);

    Route::post('cancel', [ReservationController::class, 'cancelReservation']);

    Route::post('delete', [ReservationController::class, 'delete']);
    
    Route::get('get-reservations/{userId}', [ReservationController::class, 'getReservation']);

    Route::get('get-reservations-rrp/{rrpId}', [ReservationController::class, 'getReservationPerRRP']);

    Route::get('get-reservations-id/{reservationId}', [ReservationController::class, 'getReservationPerId']);
});

?>