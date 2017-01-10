<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
     public function meeting()
    {
        return $this->hasOne('App\Meeting');
    }
}
