<?php

namespace App\Http\Controllers;

use Auth;
use App\Meeting;
use Illuminate\Http\Request;

use Illuminate\Contracts\Validation\Validator;


class MeetingController extends Controller
{

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings=Meeting::all();
        return view('meeting/index',compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meeting/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'subject' => 'required',
        ]);

        
        // store
        $meeting = new Meeting;
        $meeting->name         = $request->name;
        $meeting->subject      = $request->subject;
        $meeting->date         = $request->date;
        $meeting->user_id      = Auth::user()->id;
        $meeting->save();

        // redirect
        //Session::flash('message', 'Successfully created meeting!');
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $meeting=Meeting::find($id);
        echo $meeting;
        die;
        return view('meeting/show',compact('meeting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meeting=Meeting::find($id);
        return view('meeting/edit', compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
