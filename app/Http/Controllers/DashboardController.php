<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $tickets = Ticket::where('stock', '>', 0)->limit(9)->get();
        $locations = Location::all();
        return view('dashboard.index', compact('tickets', 'locations'));
    }
}
