<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use Session;
use Redirect;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $input = $request->all();

        //check si id du meeting a bien été créer par l'user qui insert.... A FAIRE

        $emailExist = Email::where('email_participant', '=', $input['email_participant'])->first();
        
        if ($emailExist === null) {
           Email::create($input);
           $msg = 'participant ajouté';
        }else{
            $msg = 'participant non ajouté, il existe peut-être déja'; 
        }

        Session::flash('message', $msg);

        return Redirect::to('meeting/'.$input['meeting_id'].'/edit');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($meeting_id, $email_participant)
    {
        $email = Email::where('email_participant', $email_participant)
                    ->where('meeting_id', $meeting_id)
                    ->delete();
        return back();
    }
}
