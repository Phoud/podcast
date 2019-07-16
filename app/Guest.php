<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
	protected $table = 'guests';

	public function guests(){
        return $this->hasMany('App\GuestPost', 'guest_id');
    }
}
