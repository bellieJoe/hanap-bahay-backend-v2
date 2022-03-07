<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationUpdate;
use Illuminate\Http\Request;

class ReservationUpdateController extends Controller
{
    public function getUpdates($reservationId){
        $updates = ReservationUpdate::where([
            'Reservation_ID' => $reservationId
        ])
        ->orderBy('Update_Date', 'asc')
        ->get();

        return json_encode($updates);
    }
    
    public function confirmReservation(Request $req){
        $message = null;

        $reservation = Reservation::where([
            'Reservation_ID' => $req->reid
        ]);

        if($req->meet_date == null && $req->meet_note == null){
            $message = "Your reservation has been approved by the Property Owner.";
            $reservation->update([
                'Status' => 'approved',
                'Is_New' => 0,
                'Date_Scheduled' => null,
                'Confirmation_Note' => null
            ]);
        } else {
            $message = "Your reservation has been approved by the Property Owner. See the information below for meet-up details";
            $reservation->update([
                'Status' => 'approved',
                'Is_New' => 0,
                'Date_Scheduled' => $req->meet_date,
                'Confirmation_Note' => $req->meet_note
            ]);
        }

        ReservationUpdate::create([
            'Reservation_ID' => $req->reid,
            'Update_Content' => $message,
            'Update_Date' => $req->today
        ]);


    }

    public function addUpdate(Request $req){
        $message = "The Property owner has changed the meeting details. See the updated details below";

        Reservation::where([
            'Reservation_ID' => $req->reid
        ])
        ->update([
            'Date_Scheduled' => $req->meet_date,
            'Confirmation_Note' => $req->meet_note  
        ]);

        ReservationUpdate::create([
            'Reservation_ID' => $req->reid,
            'Update_Content' => $message,
            'Update_Date' => $req->today
        ]);
    }

    public function declineReservation(Request $req){
        $message = 'Your reservation has been declined by the Property Owner.';

        Reservation::where([
            'Reservation_ID' => $req->reid
        ])->update([
            'Status' => 'declined',
            'Is_New' => 0
        ]);


        ReservationUpdate::create([
            'Reservation_ID' => $req->reid,
            'Update_Content' => $message,
            'Update_Date' => $req->today
        ]);


    }

    
}
