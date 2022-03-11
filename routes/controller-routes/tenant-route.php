<?php

use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::prefix('tenants')->group(function(){
    Route::get('{rrpId}/get-tenants', [TenantController::class, 'getTenants']);

    Route::post('add-tenant', [TenantController::class, 'addTenant']);

    Route::post('delete-tenant', [TenantController::class, 'deleteTenant']);

    Route::get('count/{rrpId}', [TenantController::class, 'countTenant']);
    
    Route::post('unboard-tenants', [TenantController::class, 'unboardTenants']);

    Route::get('get-tenant-by-userid/{userId}', [TenantController::class, 'getTenantByUserId']);
});

?>