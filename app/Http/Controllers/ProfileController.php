<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Meeting;
use App\User;
use Illuminate\Support\Facades\Input;
use Session;
use Validator;
use Storage;
use File;
use Redirect;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('/profile/profile', ['users'=>$users]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $user = User::findOrFail($id);
        $meetings = Meeting::where('user_id', $id)->get();
        return view('/profile/profile', compact('meetings'))->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id){
            $user = User::findOrFail($id);
            return view('update_profile', ['user'=>$user]);
        }else{
 
            return redirect()->to('/profile/'.Auth::user()->id.'/edit');
        }
    }
}
