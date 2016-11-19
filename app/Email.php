<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

	protected $fillable = ['email_participant', 'meeting_id'];

    public function email()
    {
        return $this->belongsTo('App\User');
    }

}
