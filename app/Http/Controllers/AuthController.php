<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register_member(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);

        $validate['password'] = Hash::make($request->password);
        $register = User::create($validate);

        $register->member()->create([
            'user_id' => $register->id
        ]);
        
        flash()->addSuccess('Success register, please login!', 'Register Success');
        return redirect('/login');
    }

    public function credential()
    {

        if(Auth::user()){
            dd(Auth::user()->name);
        }
        dd(Auth::user());
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        flash()->option('timeout', 1000)->addWarning('You are logged out', 'Log out account');

        return redirect('/');
    }

    public function showRegister(){
        return view('auth.register');
    }
    public function showLogin(){
        return view('auth.login');
    }

    public function registerEmploye(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => '',
        ]);

        $validate['password'] = Hash::make($request->password);
        $register = User::create($validate);

        $register->employe()->create([
            'user_id' => $register->id
        ]);

        flash()->addSuccess('Success add new employe', 'Employe Added');
        return redirect()->back();
    }

    public function editUser(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $employe = User::find($request->id);
        $employe->update($validate);
        flash()->addSuccess('Success edit user', 'User edited');
        return redirect()->back();
    }

    public function showUser(User $user){
        return view('user.index', compact('user'));
    }

    public function editPassword(Request $request){
        $validate = $request->validate([
            'password' => 'required',
        ]);
        $validate['password'] = Hash::make($validate['password']);


        $user = User::find($request->id);
        $user->update($validate);
        flash()->addSuccess('Success edit password', 'Password change');
        return redirect()->back();
    }
    
}
