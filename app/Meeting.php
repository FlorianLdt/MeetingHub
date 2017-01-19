<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Meeting extends Model
{
	protected $fillable = ['name', 'date', 'subject'];


	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function emails()
    {
        return $this->hasMany('App\Email');
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }



    public function checkUser($idM, $idU){

        $user = DB::table('users')->find($idU);
        $createur = DB::table('meetings')
            ->where('user_id', $user->id)
            ->where('id', $idM)
            ->get();
        if(count($createur)){
            return true;
        }
        if($user !=null){
            $participant = DB::table('emails')->where('email_participant', $user->email)->where('meeting_id', $idM)->get();
            if(count($participant)){
                return true;
            }
        }
        return false;
    }
}
