<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class sessionsController extends Controller
{
    public function login()
    {
        return view("log.login");
    }
    public function authenticating(Request $request){
        $denti=$request->validate([
            "email"=> ['required','email'],
            'password'=> ['required'],
        ]);

        if(auth::attempt($denti)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email'=> 'the provided denti do not match our reacords',
        ])->onlyInput('name');
    }

    public function logout(Request $request){
    {
        auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect('/login');
        }

}
}