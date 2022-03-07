<?php

use App\Http\Controllers\AnnouncementController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;

Route::prefix('announcements')->group(function(){
    Route::post('create', [AnnouncementController::class, 'createAnnouncement']);

    Route::get('get-anncouncements/{rrpId}', [AnnouncementController::class, 'getAnnouncementsRRPID']);

    Route::post('delete/{id}', [AnnouncementController::class, 'deleteAnnouncement']);
});

?>