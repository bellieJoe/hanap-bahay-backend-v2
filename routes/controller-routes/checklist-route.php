<?php

use App\Http\Controllers\ChecklistController;
use App\Models\Checklist;
use Illuminate\Support\Facades\Route;

Route::prefix('checklists')->group(function(){
    Route::post('create', [ChecklistController::class, 'addChecklist']);

    Route::get('is-listed/{userId}/{rrpId}', [ChecklistController::class, 'isListed']);

    Route::get('get-checklists/{userId}', [ChecklistController::class, 'getChecklists']);

    Route::post('check-list', [ChecklistController::class, 'checkList']);

    Route::post('delete', [ChecklistController::class, 'delete']);
});

?>