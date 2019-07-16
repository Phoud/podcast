<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $fillable = ['post_id', 'tag_id', 'type'];

    public function tag(){
    	return $this->belongsTo('App\tag', 'tag_id');
    }
}
