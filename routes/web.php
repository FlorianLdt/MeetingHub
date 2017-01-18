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

//Route::post('addParticipant/{id}', 'EmailController@store')->name('email.store');      //id = id du meeting

Route::get('meeting/{id}/participant', 'EmailController@show');

Route::resource('participant', 'EmailController', ['except' => [
    'show', 'destroy'
]]);

//fichier
Route::resource('fichier', 'FileController');

Route::delete('participant/{meeting_id}/delete/{email_participant}',[
    'as' => 'participant.destroy',
    'uses' => 'EmailController@destroy'
]);
/*Route::post('addParticipant/{id}', [
    'as' => 'email.store',
    'uses' => 'EmailController@store'
]);
*/
