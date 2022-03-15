<?php

use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;

Route::prefix('complaints')->group(function(){
    Route::get('get-complaints/{rrpId}', [ComplaintController::class, 'getComplaints']);

    Route::post('delete-complaint', [ComplaintController::class, 'deleteComplaint'] );

    Route::post('create', [ComplaintController::class, 'create']);

    Route::post('mark-read', [ComplaintController::class, 'markRead']);

    Route::get('count-by-rrp/{rrpId}', [ComplaintController::class, 'countComplaintsByRRP']);
});

?>