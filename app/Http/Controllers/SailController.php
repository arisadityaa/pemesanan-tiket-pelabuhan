<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boking;
use Illuminate\Http\Request;

class SailController extends Controller
{
    //
    public function index(){
        return view('sails.index');
    }

    public function ticket(Request $request){
        $ticket = Boking::with('ticket')->with('member')->whereIn('id', $request)->get()->first();
        return view('sails.index', compact('ticket'));
    }
}
