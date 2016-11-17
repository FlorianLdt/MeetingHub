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

    public function emails()
    {
        return $this->hasMany('App\Email');
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
