<?php

namespace App\classes;

use Illuminate\Http\Request;

class SessionManager
{
    public function getFromSession(Request $request, $key)
    {
        return $request->session()->get($key);
    }

    public function pushToSession(Request $request, $key, $value)
    {
        $request->session()->push($key, $value);
    }

    public function putInSession(Request $request, $key, $value)
    {
        $request->session()->put($key, $value);
    }

    public function forgetFromSession(Request $request, $key)
    {
        $request->session()->forget($key);
    }

    public function geFromSession(Request $request, $key)
    {
        return $request->session()->get($key);
    }
}