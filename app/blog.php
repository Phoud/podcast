<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blogs';

    public function tags(){
    	return $this->hasMany(PostTag::class, 'post_id');
    }

    public function selectedTag(){
    	$text = [];
    	foreach($this->tags as $key =>$tag){
    		$text[] = $tag->tag_id;
    	}
    	return json_encode($text);
    }
}
