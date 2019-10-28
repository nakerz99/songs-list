<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use Auth;
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.songs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showList()
    {
        // I use select to miminize size of data in response instead of All()
        $songs = Song::select('title', 'artist', 'created_at')->get();

        $songs = collect($songs);
        $songs = $songs->map(function($song){
            $song->date_created = date('M d, Y', strtotime($song->created_at));
            return $song;
        });
        return response()->json($songs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Song::updateOrCreate(
            ['title'      => $request->title],
            ['title'      => $request->title,
            'lyrics'      => $request->lyrics,
            'artist'      => $request->artist,
            'created_by'  => Auth::user()->id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        //
    }
}
