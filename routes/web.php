<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use \App\Mail\Reminder;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pusher', function () {
    return view('pusher');
});

Route::get('loop', function () {
    return view('loop')
        ->with('posts', \App\Post::paginate(10));
});

Route::get('dbquery', function () {
    $posts = DB::table('posts')->get();
    dd($posts);
});

Route::get('email', function () {
    return Mail::to('group@sdlug.com')->send(new Reminder);
});


Auth::routes();

Route::get('/home', 'HomeController@index');
