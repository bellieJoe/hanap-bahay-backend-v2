<?php

use App\Http\Controllers\ImgController;
use App\Models\Img;
use Illuminate\Support\Facades\Route;

Route::prefix('images')->group(function(){
    Route::post('set-profile', [ImgController::class, 'setProfilePicture']);

    Route::post('delete', [ImgController::class, 'delete']);

    Route::post('update-details', [ImgController::class, 'updateImageDetails']);

    Route::get('fetch-images-by-rrp/{rrpId}', [ImgController::class, 'fetchImagesByRRP']);

    Route::get('fetch-image', [ImgController::class, 'fetchImage']);
});

?>