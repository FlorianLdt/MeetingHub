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

	    $user = $this->user()->getQuery()->find($idU);


        $isCreator = $this->newQuery()->find($idM)->where('user_id', $idU)->get();


        if(count($isCreator)){
            return true;
        }

        if($user !=null){
            //chech si il participe à la reunion
            $isParticipant = $this->emails()->getQuery()->find()->where('email', $user->email)->where('meeting_id', $idM)->get();
            if(count($isParticipant)){
                return true;
            }
        }

        return false;


    }
}
