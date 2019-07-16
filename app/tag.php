<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = 'tags';

    public function videos_tag()
    {
        return $this->hasMany('App\videos_tag', 'tag_id');
    }
    public function podcast_tag()
    {
        return $this->hasMany('App\podcast_tag', 'tag_id');
    }
}
