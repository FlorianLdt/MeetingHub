<?php

use App\Meeting;
use App\Email;
use App\User;
use App\Fileentry;
use Illuminate\Http\Request;

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
	Route::resource('meeting', 'MeetingController', ['parameters' => [
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
        'create', 'index', 'edit', 'update'
	]], ['parameters' => [
        'fichier' => 'id'
    ]]);
	Route::delete('participant/{meeting_id}/delete/{email_participant}',[
	    'as' => 'participant.destroy',
	    'uses' => 'EmailController@destroy'
	]);

Route::group(['prefix' => 'json'], function () {    
    Route::get('meeting/{id}/fichiers', function ($id){
        $meeting = new Meeting();
        $reunion = Meeting::findOrFail($id);
        if(!$meeting->checkUser($id, Auth::user()->id)){
            App::abort(403);
        } 
        return response()->json(Fileentry::where('meeting_id', '=', $reunion->id)->get()); 

    })->middleware('auth');


    Route::get('meeting/{id}/participants', function ($id){
        $meeting = new Meeting();
        $reunion = Meeting::findOrFail($id);
        if(!$meeting->checkUser($id, Auth::user()->id)){
            App::abort(403);
        } 
        return response()->json(Email::where('meeting_id', '=', $reunion->id)->get()); 

    })->middleware('auth');

    
    Route::get('meeting/{id}', function ($id){
        $meeting = new Meeting();
        $reunion = Meeting::findOrFail($id);
        if(!$meeting->checkUser($id, Auth::user()->id)){
            App::abort(403);
        } 
        $reunion->{'fichiers'} = Fileentry::where('meeting_id', '=', $reunion->id)->get();
        $reunion->{"participants"} = Email::where('meeting_id', '=', $reunion->id)->get();
        return response()->json($reunion);    
        
    })->middleware('auth');


    
    Route::get('meeting', function (){
        $reunions =  Meeting::whereHas('emails', function($query) {
            $query -> where('email_participant', Auth::user()->email);
        })
            ->orWhere('user_id', Auth::user()->id)
            ->get();
        
        foreach ($reunions as $reunion) {
                $reunion->{"participants"} = Email::where('meeting_id', '=', $reunion->id)->get();
                $reunion->{"fichiers"} = Fileentry::where('meeting_id', '=', $reunion->id)->get();
        }

        return response()->json($reunions);
        
    })->middleware('auth');


    
    Route::get('profile', function (){
        $profile = User::where('id', Auth::user()->id)->first();
        return response()->json($profile);
    })->middleware('auth');
});
