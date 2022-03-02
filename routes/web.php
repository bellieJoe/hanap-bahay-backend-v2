<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require('controller-routes/user-route.php');

// Route::get('/', function () {
//     return "This is the backend for hanapbahay";
// });
Route::get('/token', function (Request $request) {
    return json_encode($request->session()->token());
});

Route::get('/testing', function() {
    return Admin::find(1);
});

Route::get("/mail", function() {
    return new App\Mail\VerificationMail(123445, 'Bellie Joe Jandusay');
});
