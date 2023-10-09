<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Ticket List";
        if(Auth::user()->role === 'employe'){
            $tickets = Ticket::with('location')->get();
        }else{
            $tickets = Ticket::where('stock', '>', 0)->with('location')->get();
        }
        $locations = Location::get(['id', 'name']);
        return view('tickets.index', compact('tickets', 'locations', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Create New Ticket";
        $locations = Location::get(['id', 'name']);
        return view('tickets.create', compact('locations', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required',
            'location_id' => 'required|exists:locations,id',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
            'sail_time' => 'required',
        ]);
        Ticket::create($request->all());
        flash()->addSuccess('Success create a new ticket', 'Ticket added');
        return redirect('/ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $ticket = Ticket::find($request->id);
        $ticket->update($request->all());
        flash()->addSuccess('Success edit the location', 'Ticket edited');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
        $ticket->delete();
        flash()->addWarning('The ticket was deleted', 'Location delete');
        return redirect()->back();
    }
}
