<?php

namespace App\Http\Controllers;

use App\Fileentry;
use Auth;
use App\Meeting;
use Illuminate\Http\Request;
use App\Email;
use App\User;
use DB;
use App\Document;
use Illuminate\Contracts\Validation\Validator;


class MeetingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $meetings = Meeting::whereHas('emails', function($query) {
            $query -> where('email_participant', Auth::user()->email);
        })
            ->orWhere('user_id', Auth::user()->id)
            ->get();
        
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
        //return redirect('/meeting/');
        return view('meeting/edit', compact('meeting','participant'));
        
    }


    // public function lister() {        
    //     $meetings=Meeting::all();
        
    //     return response()->json($meeting);
    // }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting=Meeting::findOrFail($id);
        $check = new Meeting();
        if(!$check->checkUser($id, Auth::user()->id)){
            abort(403);
        }
        $participant = DB::table('emails')
            ->leftJoin('users', 'emails.email_participant', '=', 'users.email')
            ->where('emails.meeting_id', '=', $id)
            ->get();
        $document=Fileentry::where('meeting_id', $id)->get();
        return view('meeting/show', ['meeting'=>$meeting, 'participants'=>$participant, 'documents'=>$document]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meeting=Meeting::findOrFail($id);
        $participants = Email::where('meeting_id', $id)->get();
        if($meeting->user_id == Auth::user()->id)
            return view('meeting/edit', compact('meeting','participant'));
        else
            return redirect('/meeting');
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
        $meeting = Meeting::find($id);
        
        $meeting->name         = $request->name;
        $meeting->subject      = $request->subject;
        $meeting->date         = $request->date;
        
        $meeting->save();
        
        return redirect('/meeting/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting = Meeting::where('id', $id)
                    ->delete();
        return redirect('/meeting/');
    }
}
