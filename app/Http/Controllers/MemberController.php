<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boking;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    public function boking(Request $request){
        $ticket = Ticket::find($request->ticket_id);

        $stock = $ticket->stock;
        $newStock = $stock - $request->count;

        $ticket->update(['stock' => $newStock]);
        flash()->addSuccess('Success Booked Ticket', 'Ticket Booked');
        return redirect('/boking/{{$request->member_id}}');


    }

    public function show($id){
        $ticket = Ticket::where('id', $id)->first();
        return view('bookings.booking', compact('ticket'));
    }

    public function index(){
        // edit midleware
        if(Auth::user()){
        if(Auth::user()->role==='member'){
            $bokings = Boking::where('member_id', Auth::user()->member->id)->with('ticket')->get();
            return view('bookings.index', compact('bokings'));
        }}
        // return view('bookings.index');
        return "ehe";
    }
}
