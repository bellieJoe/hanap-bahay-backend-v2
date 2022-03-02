<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    
    // public function signUp(Request $request){
        
    // }

    public function getFullName($id){
        $user = User::where([
            "User_List_ID" => $id
        ])->first();
        return "{$user->Firstname} {$user->Middlename} {$user->Lastname}";
    }

    public function getUserUniqueInputs(){
        return User::get(["Username", "Email", "Contact_number"]);
    }

    public function isDistinct(Request $request){
        $users = User::where(
            [$request->input('col') => $request->input('val')]
        )->first();
        
        $res = empty($users) ? true : false;
        
        return json_encode($res);
    }

    public function sendVerificationCode(Request $request) {
        Mail::to($request->input('email_address'))->send(new VerificationMail($request->input('code'), $request->input('fullname')));
    }

    public function createuserProfile($id){
        UserProfile::create([
            'User_ID' => $id,
            
        ]);
    }

    public function createNewUser(Request $request){
        User::create([
            'Firstname' => $request->input('Firstname'),
            'Middlename' => $request->input('Middlename'),
            'Lastname' => $request->input('Lastname'),
            'Birthdate' => $request->input('Birthdate'),
            'Email' => $request->input('Email'),
            'Address' => $request->input('Address'),
            'Contact_number' => $request->input('Contact_Number'),
            'User_Type' => $request->input('User_Type'),
            'Username' => $request->input('Username'),
            'Password_Hash' => $request->input('Password'),
            'Is_Boarded' => 0
        ]);
    }

    public function searchUser($username){
        $user = User::where(['username' => $username])->get();
        // $user[0]->User_ID = $user[0]->User_List_ID;
        // $user[0]->User_type = $user[0]->User_Type;
        return json_encode($user);
    }

    public function updateUserDetails_Walkin(Request $request){
        User::where(['Email', $request->input('Email')])
        ->update([
            'Birthdate' => $request->input('Birthdate'),
            'Address' => $request->input('Address'),
            'Contact_number' => $request->input('Contact_Number'),
            'Username' => $request->input('Username'),
            'Password_Hash' => $request->input('Password'),
            'Registered_By' => 'self'
        ]);
    }

    
}
