<?php

use App\Http\Controllers\RRPController;
use App\Http\Controllers\RRPTypeController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::prefix('rrp-types')->group(function(){
    Route::get('count-rrp-types/{rrpId}' , [RRPTypeController::class, 'countRRPTypes']);

    Route::post('create', [RRPTypeController::class, 'create']);

    Route::post('update', [RRPTypeController::class, 'update']);

    Route::get('get-by-rrpId/{rrpId}', [RRPTypeController::class, 'getByRRP_ID']);

    Route::get('get-by-id/{id}', [RRPTypeController::class, 'getById']);

    Route::get('get-availability/{id}', [RRPTypeController::class, 'getRRPTypeAvailability']);

});

?>

