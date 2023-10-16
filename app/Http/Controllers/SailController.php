<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SailController extends Controller
{
    //
    public function index()
    {
        return view('sails.index');
    }

    public function ticket(Request $request)
    {
        $ticket = Boking::with('ticket')->with('member')->whereIn('id', $request)->get()->first();
        return view('sails.index', compact('ticket'));
    }

    public function accept($id)
    {
        if (Auth::user()->role === 'employe') {
            $employe = Auth::user()->employe->id;
            flash()->addSuccess('Ticket Approved', 'Aprove');

            return redirect()->back();
        }
        flash()->addWarning('Not Able', 'no auth');
        return redirect()->back();
    }

    public function reject($id){
        if (Auth::user()->role === 'employe') {
            $boking = Boking::find($id);
            $boking->update(['status' => 'Reject']);
            flash()->addSuccess('Ticket Rejected', 'Reject');
            return redirect()->back();
        }
    }
}
