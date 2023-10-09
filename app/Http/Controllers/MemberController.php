<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boking;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function boking($id){
        $subtitle = $id;
        return view('bookings.index', compact('subtitle'));
    }

    public function show($id){
        $boking = Ticket::where('id', $id)->first();
        return view('bookings.booking', compact('boking'));
    }
}
