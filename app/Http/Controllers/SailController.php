<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boking;
use App\Models\Sail;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class SailController extends Controller
{
    //
    public function index()
    {
        return view('sails.index');
    }

    public function ticket(Request $request)
    {
        $ticket = Boking::with('ticket','member.user:name,id')->whereIn('id', $request)->get()->first();
        // return view('sails.index', compact('ticket'));
        // return $request;
        if(empty($ticket)){
            return response()->json(['status'=>'failed']);
        }else{
            return response()->json(['status'=>'success', 'data'=> $ticket]);
        }
    }

    public function accept($id)
    {
        if (Auth::user()->role === 'employe') {
            $data = Sail::where('boking_id', $id)->get();

            if ($data->isEmpty()) {
                $boking = Boking::find($id);
                $employe = Auth::user()->employe->id;
                Sail::create([
                    'boking_id' => $id,
                    'employe_id' => $employe,
                ]);
                $boking->update(['status' => 'Accept']);
                flash()->addSuccess('Ticket Approved', 'Aprove');
                return redirect()->back();
            } else {
                flash()->addWarning('Ticket Already Handle', 'Ticket handled');
                return redirect()->back();
            }
            
        }
        flash()->addWarning('Not Able', 'no auth');
        return redirect()->back();
    }

    public function reject($id)
    {
        if (Auth::user()->role === 'employe') {
            $boking = Boking::find($id);
            $count = $boking->count;
            $ticket_id = $boking->ticket_id;
            $ticket = Ticket::find($ticket_id);
            $ticket->update(['stock'=>$ticket->stock+$count]);
            $boking->update(['status' => 'Reject']);
            flash()->addSuccess('Ticket Rejected', 'Reject');
            return redirect()->back();
        }
    }

    public function list_sails(){
        $tickets = Ticket::with('location')->withCount([
            'boking as boking_count' => function($query){
                // $query->where('status', 'Accept');
                $query->select(Boking::raw("SUM(count) as total"))->where('status', 'Accept');
            }
        ])->get();
        // return $tickets;
        return view('sails.user_sails_list', compact('tickets'));
    }

    public function print_list($id){
        $lists = Ticket::with('boking.member.user')->whereId($id)->withCount([
            'boking as boking_count' => function($query){
                // $query->where('status', 'Accept');
                $query->select(Boking::raw("SUM(count) as total"))->where('status', 'Accept');
            }
        ])->first();
        $title = "List Penumpang Kapal";
        // return view('document.user_sails_detail', compact('lists', 'title'));
        // return $lists;
        $pdf = FacadePdf::loadview('document.user_sails_detail', compact('lists', 'title'));
        return $pdf->stream();
    }
}
