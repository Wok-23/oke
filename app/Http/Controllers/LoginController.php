<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $remember = true;
    public function index() {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
            $ingat = $request->remember ? true : false;
    
            if (Auth::attempt($credentials, $ingat)) {
                $request->session()->regenerate();
     
                return redirect()->intended('/dashboard');
            }
     
            return back()->with('loginError', 'Incorrect username or password');
    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
