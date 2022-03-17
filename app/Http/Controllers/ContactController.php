<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    //
    public function create(Request $req){
        Contact::create([
            'Contact_Number' => $req->Contact_Number,
            'Contact_Name' => $req->Contact_Name,
            'Contact_Type' => $req->Contact_Type,
            'RRP_ID' => $req->RRP_ID
        ]);
    }

    public function getContactsRRPID($rrpId){
        $contacts = Contact::where(['RRP_ID' => $rrpId])->get();

        return json_encode($contacts);
    }

    public function getContact($id){
        $contact = Contact::where(['Contact_ID' => $id])->first();

        return json_encode($contact);
    }

    public function updateContact(Request $req, $id){
        $contact = Contact::where([
            'Contact_ID' => $id
        ]);

        $contact->update([
            'Contact_Number' => $req->cnumber,
            'Contact_Name' => $req->cname,
            'Contact_Type' => $req->ctype
        ]);

        return json_encode($contact->get());
    }

    public function deleteContact($id, $rrpId){
        $contact = Contact::where(['Contact_ID' => $id]);

        if($contact->first()->RRP_ID != $rrpId){
            http_response_code(403);
            return;
        } 

        $contact->delete();

        $contacts = Contact::where(['RRP_ID' => $rrpId])->get();

        return json_encode($contacts);
    }
}
