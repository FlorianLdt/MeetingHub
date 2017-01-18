<?php

namespace App\Http\Controllers;

use App\Fileentry;
use App\Meeting;
use Illuminate\Support\Facades\Auth;
use Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $meeting_id = Request::input('meeting_id');
        $file = Request::file('addFile');

        if($file){


            //sauvegarde du fichier
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put('/MeetingDocuments/'.$meeting_id.'/'.$file->getFilename().'.'.$extension,  File::get($file));



            //enregistrement en base
            $entry = new Fileentry();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename().'.'.$extension;
            $entry->meeting_id = $meeting_id;
            $entry->document_path = '/MeetingDocuments/'.$meeting_id.'/'.$file->getFilename().'.'.$extension;

            $entry->save();

        }

        return response()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $header = array(
            'Content-Type' => 'application/octet-stream',
        );

        $file = Fileentry::findOrFail($id);

        $meeting = new Meeting();

        //check si l'user est dans le meeting
        if($meeting->checkUser($file->meeting_id, Auth::user()->id)){
            $path = storage_path('app'.$file->document_path);
        }else{
            $path = storage_path('app/MeetingDocuments/err.txt');
        }


        return response()->download($path, $file->original_name, $header);

    }
}
