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

    public function updateUserProfile(Request $request, $userId){
        $user = UserProfile::where(['User_ID' => $userId]);
        if($request->input('uniq') == 2){
            $user->update([
                'Occupation' => $request->input('Occupation'),
                'Work_Address' => $request->input('Work_Address'),
                'Highest_Education' => $request->input('Highest_Education'),
                'School_Name' => $request->input('School_Name'),
                'School_Address' => $request->input('School_Address')
            ]);
        } elseif($request->input('uniq') == 3){
            $user->update([
                'Guardian_Name' => $request->input('Guardian_Name'),
                'Contact_Number' => $request->input('Contact_Number'),
                'Relationship' => $request->input('Relationship'),
                'School_Name' => $request->input('School_Name'),
                'Address' => $request->input('Address')
            ]);
        }
    }
}
