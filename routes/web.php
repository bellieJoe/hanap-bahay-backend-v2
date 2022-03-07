<?php

use App\Mail\TenantVerificationMail;
use App\Models\Admin;
use App\Models\User;
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
require('controller-routes/rrpsubscription-route.php');
require('controller-routes/rrp-route.php');
require('controller-routes/user-profile-route.php');
require('controller-routes/conversation-route.php');
require('controller-routes/tenant-route.php');
require('controller-routes/tenant-boarded-rrp-route.php');
require('controller-routes/announcement-route.php');
require('controller-routes/contact-route.php');
require('controller-routes/payment-history.php');
require('controller-routes/rating-route.php');
require('controller-routes/complaint-route.php');
require('controller-routes/reservation-route.php');
require('controller-routes/checklist-route.php');
require('controller-routes/reservation-update-route.php');


Route::get('/token', function (Request $request) {
    return json_encode($request->session()->token());
});

Route::get('/testing', function() {
    return User::all()->pluck('User_List_ID');
});

Route::get("/mail", function() {
    return new App\Mail\VerificationMail(123445, 'Bellie Joe Jandusay');
});

Route::get("/tenant-registration-mail", function() {
    return new TenantVerificationMail('jandusayjoe14@gmail.com', 'boacpuregold@pubh.site', "Bellie Joe Jandusay", "Juan Dela Cruz");
});
