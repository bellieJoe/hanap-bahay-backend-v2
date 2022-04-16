<?php

namespace App\Http\Controllers;

use App\Mail\TenantVerificationMail;
use App\Models\Notification;
use App\Models\RRP;
use App\Models\Tenant;
use App\Models\TenantBoardedRRP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TenantController extends Controller
{
    //
    public function getTenants($rrpId){
        $tenants = Tenant::where([
            'RRP_ID' => $rrpId
        ])
        ->get();

        return json_encode($tenants);
    }

    public function addTenant(Request $req){

        // Email: string, 
        // rrpid:number, 
        // date:string, 
        // time: string, 
        // RRP_Type_ID: number

        $RRP = RRP::where([
            'RRP_ID' => $req->rrpid
        ])->first();

        $Owner = User::where([
            'User_List_ID' => $RRP->Owner_ID
        ])->first();
 
        // check if the tenant is already a user
        $Tenant = User::where([
            'Email' => $req->Email
        ])->first();

        // create user for tenant if not registered
        if(empty($Tenant)){
            User::create([
                'Email' => $req->Email,
                'Registered_By' => 'property owner',
                'User_Type' => 'tenant',
                "Is_Boarded" => 0
            ]);

            $Tenant = User::where([
                'Email' => $req->Email
            ])->first();

            Mail::to($req->Email)->send(new TenantVerificationMail($Owner->Email, $req->Email, $Owner->Firstname." ".$Owner->Lastname, null));

        }
        
        Tenant::create([
            'User_ID' => $Tenant->User_List_ID, 
            'RRP_ID' => $req->input('rrpid'),
            'RRP_Type_ID' => $req->input('RRP_Type_ID'),
            'Date_Added' => $req->input('date'), 
            'Time_Added' => $req->input('time')
        ]);

        User::where([
            'User_List_ID' => $Tenant->User_List_ID
        ])
        ->update([
            'Is_Boarded' => 1
        ]);

        TenantBoardedRRP::create([
            'Tenant_ID' => $Tenant->User_List_ID,
            'RRP_ID' => $req->input('rrpid')
        ]);

        Notification::create([
            'User_ID' => $Tenant->User_List_ID,
            'Date_Notified' => Carbon::now(),
            'Type' => "New Tenant",
            'Notification_Content' => "You have been added as a Tenant to ".$RRP->RRP_Name,
            'Destination_Link' => "/tpmembers",
            'Extra_ID' => null
        ]);

    }

    public function deleteTenant(Request $req){
        Tenant::where(['User_ID' => $req->input('id')])
        ->delete();

        User::where(['User_List_ID' => $req->input('id')])
        ->update(['Is_Boarded' => 0]);
    }

    public function countTenant($rrpId){
        $tenantCount = Tenant::where([
            'RRP_ID' => $rrpId
        ])->count();

        return json_encode($tenantCount);
    }   

    public function unboardTenants(Request $req){
        $tenants = Tenant::where([
            'RRP_ID' => $req->rrpid    
        ])->get()->pluck('User_ID');

        foreach($tenants as $tenant){
            User::where([
                'User_List_ID' => $tenant
            ])
            ->update([
                'Is_Boarded' => 0
            ]);
        }
    }

    public function getTenantByUserId($userId){
        $tenants = Tenant::where([
            'User_ID' => $userId
        ])->first();

        return json_encode($tenants);
    }

}
