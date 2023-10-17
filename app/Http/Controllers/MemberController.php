<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boking;
use App\Models\Ticket;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
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
        Boking::create($request->all());

        flash()->addSuccess('Success Booked Ticket', 'Ticket Booked');
        return redirect("/boking");
    }

    public function show($id){
        $ticket = Ticket::where('id', $id)->first();
        return view('bookings.booking', compact('ticket'));
    }

    public function index(){
        // edit midleware
        if(Auth::user()){
        if(Auth::user()->role==='member'){
            $bokings = Boking::where('member_id', Auth::user()->member->id)->with('ticket', 'sail')->get();
            return view('bookings.index', compact('bokings'));
        }}
        // return view('bookings.index');
        return "ehe";
    }

    public function print_book($id){
        $ticket = Boking::where('id', $id)->with('ticket', 'member')->first();
        $title = "Bukti Booking";
        $pdf = FacadePdf::loadview('document.booked', compact('ticket', 'title'));
        return $pdf->stream();
    }
}
