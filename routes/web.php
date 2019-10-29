<?php


Route::get('/', function () {
    return redirect('songs');
});

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect('songs');
});


// songs
Route::get('/songs/showlist', 'SongController@showList')->name('home');
Route::resource('songs','SongController');