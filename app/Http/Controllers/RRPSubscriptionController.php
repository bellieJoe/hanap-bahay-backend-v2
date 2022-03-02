<?php

namespace App\Http\Controllers;

use App\Models\RRPSubscription;
use Illuminate\Http\Request;

class RRPSubscriptionController extends Controller
{
    //
    public function addRHSubscription($userId){
        RRPSubscription::create([
            'User_ID' => $userId
        ]);
    }
}
