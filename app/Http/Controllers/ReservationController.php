<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationUpdate;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function addReservation(Request $req){
        Reservation::create([
            'User_ID' => $req->uid,
            'RRP_ID' => $req->rrpid,
            'Date_Reserve' => $req->date,
            'Reservation' => $req->amount
        ]);
    }

    public function getReservation($userId){
        $reservations = Reservation::where([
            ['User_ID' , $userId], 
            ['Deleted_From', null]
        ])
        ->orWhere([
            ['User_ID' , $userId], 
            ['Deleted_From', '!=', $userId]
        ])
        ->orderBy('Date_Reserve', 'desc')
        ->get();

        return json_encode($reservations);
    }

    public function getReservationPerRRP($rrpId){
        $reservations = Reservation::where([
            ['RRP_ID' , $rrpId], 
            ['Deleted_From', null]
        ])
        ->orWhere([
            ['RRP_ID' , $rrpId], 
            ['Deleted_From', '!=', $rrpId]
        ])
        ->orderBy('Date_Reserve', 'desc')
        ->get();

        return json_encode($reservations);
    }

    public function getReservationPerId($reservationId){
        $reservations = Reservation::where([
            'Reservation_ID' => $reservationId
        ])
        ->get();

        return json_encode($reservations);
    }

    public function cancelReservation(Request $req){
        Reservation::where([
            'Reservation_ID' => $req->reid
        ])
        ->update([
            'Status' => 'canceled'
        ]);
    }

    public function delete(Request $req){
        $reservation =  Reservation::where([
            'Reservation_ID' => $req->reid
        ]);

        if($reservation->first()->Deleted_From == null){
            $reservation->update([
                'Deleted_From' => $req->id
            ]);
        } else {
            $reservation->delete();
            ReservationUpdate::where([
                'Reservation_ID' => $req->reid
            ])->delete();
        }


    }
}
