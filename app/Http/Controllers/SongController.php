<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\genre;
use App\Models\savedList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SongController extends Controller
{
    public function index(Genre $genre)
    {
        $songs = $genre->songs()->with(['genre'])->get();//pagination nodig
        return view('genre',[
            'songs'=> $songs,
            'genre'=> $genre
        ]);
    }

    public function song(Song $song)
    {
        $genre = $song->genre()->first();
        $lists = savedList::where('user_id', Auth::user()->id)->get();
        return view('song',[
            'song'=> $song,
            'genre'=> $genre,
            'lists'=> $lists
        ]);
    }
}
