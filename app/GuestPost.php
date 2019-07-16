<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestPost extends Model
{
    protected $fillable = ['post_id', 'guest_id', 'type'];

    public function Media()
    {
        return $this->belongsTo('App\Media');
    }
     public function Guest()
    {
        return $this->belongsTo('App\Guest');
    }

}
