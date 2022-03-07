<?php

use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;

Route::prefix('complaints')->group(function(){
    Route::get('get-complaints/{rrpId}', [ComplaintController::class, 'getComplaints']);

    Route::post('delete-complaint', [ComplaintController::class, 'deleteComplaint'] );
});

?>