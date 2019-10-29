<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreSongList;
class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.songs.index');
    }

    
    public function showList()
    {
        // I use select to miminize size of data in response instead of All()
        $songs = Song::select('id','title', 'artist', 'created_at')
                ->orderBy('id', 'desc')
                ->get();
                
        $songs = collect($songs);
        $songs = $songs->map(function($song){
            $song->date_created = date('M d, Y', strtotime($song->created_at));
            return $song;
        });
        return response()->json($songs);
    }

    public function store(StoreSongList $request)
    {
        Song::updateOrCreate(
            ['title'      => $request->title],
            ['title'      => $request->title,
            'lyrics'      => $request->lyrics,
            'artist'      => $request->artist,
            'created_by'  => Auth::user()->id]
        );
        
        return response()->json('success');
    }

    public function show(Song $song)
    {
        return response()->json($song);
    }

    public function destroy(Song $song)
    {
        Song::where('id', $song->id)->delete();
        return response()->json($song->title);
    }
}
