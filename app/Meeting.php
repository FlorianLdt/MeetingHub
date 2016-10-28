<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
	protected $fillable = ['name', 'date', 'subject'];


	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
