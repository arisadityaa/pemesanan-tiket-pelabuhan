<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
    //
    public function index(){
        $employes = User::where('role', 'employe')->get();
        return view('employe.index', compact('employes'));
    }
    
}
