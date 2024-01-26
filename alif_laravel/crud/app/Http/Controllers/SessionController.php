<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        return view("sesi/index");
    }
    function login(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('/')->with('success','Berhasil Login');
        }else{
            return redirect('sesi')->with('error','Silahkan Masukkan Email dan Sandi yang Benar');
        }
        
    }
    function logout(){
        Auth::logout();
        redirect('sesi')->with('success','Berhasil Logout');
    }
}
