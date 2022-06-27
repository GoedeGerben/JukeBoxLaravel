<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;
use App\Models\SavedList;
use App\Models\SavedListSong;

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

        return redirect('/tempList');
    }

    public function showList(Request $request)
    {
        $lists = SavedList::get();
        $songs = $request->session()->get('songs.song');
        $duration = $request->session()->get('duration');
        return view('lists',[
            'lists'=> $lists,
            'songs'=> $songs,
            'duration' => $duration
        ]);
    }

    public function playList(Request $request, SavedList $savedList)
    {
        $list = SavedList::where('id', $request->list_id)->first();
        $listSongs = SavedListSong::where('saved_list_id', $request->list_id)->get();
        
        $songs = array();
        foreach ($listSongs as $listSong) {
            array_push($songs, Song::where('id', $listSong->song_id)->first());
        }

        return view('playlist',[
            'list'=> $list,
            'songs'=> $songs,
        ]);
    }

    public function tempList(Request $request)
    {
        $songs = $request->session()->get('songs.song');
        $duration = $request->session()->get('duration');
        return view('tempList',[
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
        $id = Auth::id(); 
        $duration = $request->session()->get('duration');

        $saved_list_id = SavedList::create([
            'name' => $request->name,
            'user_id' => $id,
            'duration' => $duration,
        ])->id;

        $songs = $request->session()->get('songs.song');
        foreach($songs as $song){
            SavedListSong::create([
                'saved_list_id' => $saved_list_id,
                'song_id' => $song,
            ]);
        }
        return redirect('/flushList');
    }
}
