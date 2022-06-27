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
        $song = Song::where('id', $request->song_id)->first();
        
        $duration = $request->session()->get('duration');
        $newDuration = ($duration + $song->length);
        $request->session()->put('duration', $newDuration);

        return redirect('/lists');
    }

    public function showList(Request $request/*, Song $time*/)
    {
        $songs = $request->session()->get('songs.song');
        $duration = $request->session()->get('duration');
        return view('lists',[
            'songs'=> $songs,
            'duration' => $duration
        ]);
    }

    public function flushList(Request $request)
    {
        $request->session()->forget('songs.song');
        $request->session()->forget('duration');
        return redirect('/lists');
    }

    public function forgetSongFromSession(Request $request)
    {
        $songs = $request->session()->get('songs.song');
        $request->session()->forget('songs.song');
        $newSongs = \array_diff($songs, [$request->song_id]);
        foreach($newSongs as $song){
            $request->session()->push('songs.song', $song);
        }
        $removedSong = array_diff($songs, $newSongs);
        $removedDuration = Song::where('id', $removedSong)->first();
        $duration = $request->session()->get('duration');
        $newDuration = ($duration - $removedDuration->length);
        $request->session()->put('duration', $newDuration);
        return redirect('/lists');
    }

    public function saveList(Request $request)
    {
        $songs = $request->session()->get('songs.song');
        return redirect('/flushList');
    }
}
