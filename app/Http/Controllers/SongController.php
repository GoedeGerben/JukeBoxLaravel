<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class SongController extends Controller
{
    public function index(Genre $genre)
    {
        $songs = $genre->songs()->with(['genre'])->get();//pagination nodig
        return view('song',[
            'songs'=> $songs,
            'genre'=> $genre
    ]);
    }
}
