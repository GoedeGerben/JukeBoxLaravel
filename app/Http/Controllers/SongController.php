<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class SongController extends Controller
{
    public function index()
    {
        $users = DB::table('songs')->get();
 
        return view('user.index', ['songs' => $songs]);
    }
}
