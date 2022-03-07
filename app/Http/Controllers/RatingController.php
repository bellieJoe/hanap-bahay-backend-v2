<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{   
    public function getRatings($rrpId){
        $ratings = Rating::where([
            'RRP_ID' => $rrpId
        ])->get();

        return json_encode($ratings);
    }

    public function addRating(Request $req){
        $rating = Rating::where([
            'RRP_ID' => $req->rrpid,
            'User_ID' => $req->tid
        ]);

        if($rating->count() > 0){
            $rating->update([
                'Rating_Value' => $req->rate_val,
                'Date_Rated' => $req->date
            ]);
        } else {
            Rating::create([
                'RRP_ID' => $req->rrpid,
                'User_ID' => $req->tid,
                'Rating_Value' => $req->rate_val,
                'Date_Rated' => $req->date
            ]);
        }
    }

    public function addReview(Request $req){
        $rating = Rating::where([
            'RRP_ID' => $req->rrpid,
            'User_ID' => $req->tid
        ]);

        if($rating->count() > 0){
            $rating->update([
                'Review_Content' => $req->review_con,
                'Date_Rated' => $req->date
            ]);
        } else {
            Rating::create([
                'RRP_ID' => $req->rrpid,
                'User_ID' => $req->tid,
                'Review_Content' => $req->review_con,
                'Date_Rated' => $req->date
            ]);
        }
    }
}
