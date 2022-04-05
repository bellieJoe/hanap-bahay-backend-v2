<?php

use App\Http\Controllers\RRPTypeController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::prefix('rrp-types')->group(function(){
    Route::get('count-rrp-types/{rrpId}' , [RRPTypeController::class, 'countRRPTypes']);
});

?>

