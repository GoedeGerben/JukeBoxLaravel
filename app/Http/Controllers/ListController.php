<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;
use App\Models\SavedList;
use App\Models\SavedListSong;
use App\classes\SessionManager;

class ListController extends Controller
{
    public function index()
    {

    }

    public function addToList(Request $request)
    {
        $songToAdd = Song::where('id', $request->song_id)->first();
        $sessionManager = new SessionManager();
        $songs = $sessionManager->getFromSession($request, 'songs.song');
        
        if($request->list == 'session'){
            $greenlight = true;
            if(!is_null($songs)){
                foreach($songs as $song){
                    if($song == $request->song_id){
                        $greenlight = false;
                    }
                }
            }
            if($greenlight == true || is_null($songs)) {
                $songs = $sessionManager->getFromSession($request, 'songs.song');

                $sessionManager->pushToSession($request, 'songs.song', $request->song_id);

                $duration = $sessionManager->getFromSession($request, 'duration');
                $newDuration = ($duration + $songToAdd->length);
                $sessionManager->putInSession($request, 'duration', $newDuration);
            }
            return redirect('/tempList');
        }else{
            SavedListSong::create([
                'saved_list_id' => $request->list,
                'song_id' => $request->song_id,
            ]);
            $selectedList = SavedList::where('id', $request->list)->first();
            $newDuration = ($selectedList->duration + $songToAdd->length);
            SavedList::where('id', $request->list)->update(['duration' => $newDuration]);
        }

        return redirect('/lists');
    }

    public function showList(Request $request)
    {
        $sessionManager = new SessionManager();
        $lists = SavedList::where('user_id', Auth::user()->id)->get();
        $songs = $sessionManager->getFromSession($request, 'songs.song');
        $duration = $sessionManager->getFromSession($request, 'duration');
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

    public function removePlayList(Request $request)
    {//playlist plus alle saved_list_songs van de playlists
        SavedList::where('id',$request->list_id)->delete();
        SavedListSong::where('saved_list_id',$request->list_id)->delete();
        return redirect('/lists');
    }

    public function editPlayList(Request $request)
    {
        SavedList::where('id', $request->list_id)->update(['name' => $request->name]);
        return redirect('/lists');
    }

    public function removePlayListSong(Request $request)
    {
        //edit duration
        $song = Song::where('id', $request->song_id)->first();
        $list = SavedList::where('id', $request->list_id)->first();
        $newduration = $list->duration - $song->length;
        SavedList::where('id', $request->list_id)->update(['duration' => $newduration]);

        //remove song
        SavedListSong::where('saved_list_id', $request->list_id)->where('song_id', $request->song_id)->delete();


        return redirect('/lists');
    }

    public function tempList(Request $request)
    {   
        $sessionManager = new SessionManager();
        $songs = $sessionManager->getFromSession($request, 'songs.song');
        $duration = $sessionManager->getFromSession($request, 'duration');
        $names = Song::get();
        return view('tempList',[
            'songs'=> $songs,
            'duration' => $duration,
            'names'=> $names
        ]);
    }

    public function flushList(Request $request)
    {
        $sessionManager = new SessionManager();
        $sessionManager->forgetFromSession($request, 'songs.song');
        $sessionManager->forgetFromSession($request, 'duration');
        return redirect('/lists');
    }

    public function forgetSongFromSession(Request $request)
    {
        $sessionManager = new SessionManager();
        $songs = $sessionManager->getFromSession($request, 'songs.song');
        $sessionManager->forgetFromSession($request, 'songs.song');
        $newSongs = \array_diff($songs, [$request->song_id]);
        foreach($newSongs as $song){
            $sessionManager->pushToSession($request, 'songs.song', $song);
        }
        $removedSong = array_diff($songs, $newSongs);
        $removedDuration = Song::where('id', $removedSong)->first();
        $duration = $sessionManager->getFromSession($request, 'duration');
        $newDuration = ($duration - $removedDuration->length);
        $sessionManager->putInSession($request, 'duration', $newDuration);
        return redirect('/lists');
    }

    public function saveList(Request $request)
    {
        $sessionManager = new SessionManager();
        $id = Auth::id(); 
        $duration = $sessionManager->getFromSession($request, 'duration');

        $saved_list_id = SavedList::create([
            'name' => $request->name,
            'user_id' => $id,
            'duration' => $duration,
        ])->id;

        $songs = $sessionManager->getFromSession($request, 'songs.song');
        foreach($songs as $song){
            SavedListSong::create([
                'saved_list_id' => $saved_list_id,
                'song_id' => $song,
            ]);
        }
        return redirect('/flushList');
    }
}
