<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function getUserProfile($userId){
        $user = UserProfile::where(['User_ID' => $userId])->get();

        return json_encode($user);
    }
}
