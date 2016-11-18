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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('meeting', 'MeetingController');

Route::resource('profile', 'ProfileController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('addParticipant/{id}', 'EmailController@store');      //id = id du meeting

Route::get('meeting/{id}/participant', 'EmailController@show', [
    'name' => 'email.show'
]);