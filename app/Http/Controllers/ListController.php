<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {

    }

    public function addToList(Request $request)
    {
        $request->session()->push('songs.song', $request->song_id);
        return redirect('/lists');
    }

    public function showList(Request $request)
    {
        $songs = $request->session()->get('songs.song');
        return view('lists',[
            'songs'=> $songs
        ]);
    }

    public function flushList(Request $request)
    {
        $request->session()->forget('songs.song');
        return redirect('/lists');
    }

    public function forgetSongFromSession(Request $request)
    {
        $request->session()->forget('name');
        return redirect('/lists');
    }
}
