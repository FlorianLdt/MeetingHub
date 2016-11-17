<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function email()
    {
        return $this->hasOne('App\User');
    }
}
