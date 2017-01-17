<?php


use App\Meeting;
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
    Route::pattern('id', '[0-9]+');


	Route::get('/', function () {
	    return view('welcome');
	});

	Route::resource('meeting', 'MeetingController', ['except' =>['destroy']], ['parameters' => [
        'meeting' => 'id'
    ]]);

	Route::resource('profile', 'ProfileController', ['except' =>['create', 'update', 'update', 'destroy']], ['parameters' => [
        'profile' => 'id'
    ]]);

	Auth::routes();

	Route::get('home', 'HomeController@index', ['parameters' => [
        'home' => 'id'
    ]]);

	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


//	Route::get('meeting/{id}/participant', 'EmailController@show');


	Route::resource('participant', 'EmailController', ['except' =>['create', 'update', 'index', 'edit', 'destroy']], ['parameters' => [
        'profile' => 'id'
    ]]);



	Route::resource('fichier', 'FileController', ['except' => [
        'destroy', 'create', 'index', 'edit', 'update'
	]], ['parameters' => [
        'fichier' => 'id'
    ]]);



	Route::delete('participant/{meeting_id}/delete/{email_participant}',[
	    'as' => 'participant.destroy',
	    'uses' => 'EmailController@destroy'
	]);







Route::group(['suffix' => 'json'], function () {
    Route::get('reunion', function ()    {
    	$reunion = Meeting::all();
        return response()->json($reunion);
	});
});

