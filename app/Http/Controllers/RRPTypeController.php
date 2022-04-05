<?php

namespace App\Http\Controllers;

use App\Models\RRPType;
use Illuminate\Http\Request;

class RRPTypeController extends Controller
{
    public function countRRPTypes($rrpId) {
        $count = RRPType::where([
            'RRP_ID' => $rrpId
        ])->count();

        return json_encode($count);
    }   
}
