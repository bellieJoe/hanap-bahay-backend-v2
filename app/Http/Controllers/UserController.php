<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
