<?php

use App\Http\Controllers\TenantBoardedRRPController;
use Illuminate\Support\Facades\Route;

Route::prefix('tenant-boarded-rrps')->group(function(){
    Route::post('add-tenant', [TenantBoardedRRPController::class, 'addBoardedRRP']);

    Route::get('get-tenant/{tenantId}/{rrpId}', [TenantBoardedRRPController::class, 'getTenant']);
})

?>