<?php

use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::prefix('ratings')->group(function(){
    Route::get('get-ratings/{rrpId}', [RatingController::class, 'getRatings']);

    Route::post('add-rating', [RatingController::class, 'addRating']);

    Route::post('add-review', [RatingController::class, 'addReview']);
});

?>