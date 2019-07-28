<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    public function download(){
        return $this->hasMany('App\Download', 'post_id');
    }
    public function like(){
        return $this->hasMany('App\Like', 'post_id');
    }
    public function category()
    {
        return $this->belongsTo('App\category');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    
    public function media_tag()
    {
        return $this->hasMany('App\PostTag', 'post_id');
    }
    public function selectedTag(){
        $text = [];
        foreach($this->tags as $key =>$tag){
            $text[] = $tag->tag_id;
        }
        return json_encode($text);
    }
    public function selectedGuest(){
        $text = [];
        foreach($this->guests as $key =>$guest){
            $text[] = $guest->guest_id;
        }
        return json_encode($text);
    }

    public function tags(){
        return $this->hasMany(PostTag::class, 'post_id');
    }
    public function guests(){
        return $this->hasMany(GuestPost::class, 'post_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment', 'post_id');
    }
}
