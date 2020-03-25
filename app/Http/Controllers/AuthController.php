<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;  //import auth bawaan laravel
class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    //post gunakan class request
    public function postlogin(Request $request)
    {
        // dd($request->all()); buat cek apa aja yang diketik didalam form gmail dan password
        /**
         * aut dibawah belum menggunakan aut yang ada dilaravel 
         */
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboards');
        }
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
