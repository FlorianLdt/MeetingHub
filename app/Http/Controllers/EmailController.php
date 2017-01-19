<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use Session;
use Redirect;
use App\Mail\InvitationEmail;
use Mail;

class EmailController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $emailExist = Email::where('email_participant',  $input['email_participant'])
                    ->where('meeting_id', $input['meeting_id'])
                    ->first();
        
        if ($emailExist === null) {
           Email::create($input);
           $msg = 'participant ajouté';
        }else{
            $msg = 'participant non ajouté, il existe peut-être déja'; 
            Session::flash('message', $msg);
            return Redirect::to('meeting/'.$input['meeting_id']);
        }

        Session::flash('message', $msg);
        
        Mail::to($input['email_participant'])->send(new InvitationEmail($input['meeting_id'], $input['email_participant']));

        return Redirect::to('meeting/'.$input['meeting_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //on rÈcupËre la liste des participants au format JSON

        $participants = Email::where('meeting_id', $id)->get();
        return Response::json( $participants);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($meeting_id, $email_participant)
    {
        $email = Email::where('email_participant', $email_participant)
                    ->where('meeting_id', $meeting_id)
                    ->delete();
        return back();
    }
}
