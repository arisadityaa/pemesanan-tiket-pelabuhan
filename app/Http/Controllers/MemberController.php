<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function boking($id){
        $subtitle = $id;
        return view('bookings.index', compact('subtitle'));
    }

    public function show(){
        return view('bookings.booking');
    }
}
