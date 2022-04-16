<?php

namespace App\Http\Controllers;

use App\Mail\TenantVerificationMail;
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
        User::where([
            'Email' =>  $request->input('Email')
        ])
        ->update([
            'Birthdate' => $request->input('Birthdate'),
            'Address' => $request->input('Address'),
            'Contact_number' => $request->input('Contact_Number'),
            'Username' => $request->input('Username'),
            'Password_Hash' => $request->input('Password'),
            'Registered_By' => 'self'
        ]);
    }

    public function getUserDetails($id){
        $user = User::where(['User_List_ID' => $id])->get();
        
        return json_encode($user);
    }

    public function updateUser($id, Request $request){
        if($request->input('uniq') == 0){
            User::where([
                'User_List_ID' => $id
            ])
            ->update([
                'Firstname' => $request->input('Firstname'),
                'Middlename' => $request->input('Middlename'),
                'Lastname' => $request->input('Lastname'),
                'Address' => $request->input('Address'),
                'Birthdate' => $request->input('Birthdate'),
            ]);
        }else{
            User::where([       
                'User_List_ID' => $id
            ])
            ->update([
                'Contact_number' => $request->input('Contact_Number')
            ]);
        }
    }

    public function confirmPassword($id, Request $req){
        $passsword = User::where([
            'User_List_ID' => $id
        ])->first()->Password_Hash;

        if($passsword === $req->input('pass')){
            return json_encode(1);
        }else{
            return json_encode(0);
        }
    }

    public function changePassword($id, Request $req){
        $user = User::where([
            'User_List_ID' => $id
        ]);
        if($user->first()->Password_Hash == $req->input('oldpass')){
            $user->update([
                'Password_Hash' => $req->input('newpass')
            ]);
            return json_encode(1);
        }else{
            return json_encode(0);
        }
    }

    public function updatePrivacy($id, Request $req){
        User::where([
            'User_List_ID' => $id
        ])
        ->update([
            'Privacy' => $req->input('Settings')
        ]);
    }

    public function searchTenantFirstname(Request $req){

        $tenant = User::where([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Middlename', 'like', $req->input('name')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Lastname', 'like', $req->input('name')."%"]
        ])
        ->orderBy('Firstname', 'asc')
        ->get(); 


        return json_encode($tenant);
    }

    public function searchTenant2Name(Request $req){
        $tenant = User::where([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name1')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name1')." ".$req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Middlename', 'like', $req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Middlename', 'like', $req->input('name1')." ".$req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Lastname', 'like', $req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Lastname', 'like', $req->input('name1')." ".$req->input('name2')."%"]
        ])
        ->orderBy('Firstname', 'asc')
        ->get(); 


        return json_encode($tenant);
    }

    public function searchTenant3Name(Request $req){
        $tenant = User::where([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name1')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name1')." ".$req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Middlename', 'like', $req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Middlename', 'like', $req->input('name2')." ".$req->input('name3')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Lastname', 'like', $req->input('name3')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Lastname', 'like', $req->input('name2')." ".$req->input('name3')."%"]
        ])
        ->orderBy('Firstname', 'asc')
        ->get(); 


        return json_encode($tenant);
    }

    public function searchTenant4Name(Request $req){
        $tenant = User::where([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name1')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Firstname', 'like', $req->input('name1')." ".$req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Middlename', 'like', $req->input('name2')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Middlename', 'like', $req->input('name2')." ".$req->input('name3')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Lastname', 'like', $req->input('name3')."%"]
        ])
        ->orWhere([
            ['User_type' , 'tenant'],
            ['Is_Boarded' , 0],
            ['Lastname', 'like', $req->input('name3')." ".$req->input('name4')."%"]
        ])
        ->orderBy('Firstname', 'asc')
        ->get(); 


        return json_encode($tenant);
    }

    public function getTenantInfo($id){
        $user = User::where(['User_List_ID' => $id])
        ->get();

        // $user->User_ID = $user->User_List_ID;

        return json_encode($user);
    }

    public function checkIfRegisteredEmail(Request $req){
        $user = User::where([
            'Email' => $req->input('Email')
        ])->first();

        return json_encode($user);
    }

    public function sendTenantVerificationMail(Request $req){
        Mail::to($req->Receiver_Email)->send(new TenantVerificationMail($req->Owner_Email, $req->Receiver_Email, $req->Sender_Name, $req->Receiver_Name));
    }

    public function registerTenant(Request $req){
        User::create([
            'Firstname' => $req->Firstname,
            'Middlename' => $req->Middlename,
            'Lastname' => $req->Lastname,
            'Email' => $req->Email,
            'User_Type' => 'tenant',
            'Is_Boarded' => '1',
            'Registered_By' => 'property owner'
        ]);
    }

    public function checkUsernameByUsername($username){
        $User = User::where([
            'Username' => $username
        ])->first();

        if(!empty($User)){
            return json_encode("TAKEN");
        }
        else {
            return json_encode("NOT TAKEN");
        }
    }

}
