<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request) 
    {
        //validate

        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required|confirmed',
        ]);

        //sign in

       if (!auth()->attempt($request->only('email', 'password'))) {
           return back()->with('status', 'Invalid login details');
       }

        //redirect

        return redirect('/home');
    }
}
