<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

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

    public function showList(Request $request/*, Song $time*/)
    {
        
        //$time = Song::get(); //voor de duration van een playlist poging
        $songs = $request->session()->get('songs.song');
        //DD($songs);
        //$request->session()->forget('songs.song');
        return view('lists',[
            'songs'=> $songs/*,
            'time' => $time*/
        ]);
    }

    public function flushList(Request $request)
    {
        $request->session()->forget('songs.song');
        return redirect('/lists');
    }

    public function forgetSongFromSession(Request $request)
    {
        $songs = $request->session()->get('songs.song');
        $request->session()->forget('songs.song');
        $songs = \array_diff($songs, [$request->song_id]);
        foreach($songs as $song){
            $request->session()->push('songs.song', $song);
        }
        return redirect('/lists');
    }

    public function saveList(Request $request)
    {
        $songs = $request->session()->get('songs.song');
        return redirect('/flushList');
    }
}
