<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';

    public function video()
    {
        return $this->hasMany('App\video', 'category_id');
    }
    public function podcast()
    {
        return $this->hasMany('App\podcast', 'category_id');
    }
    
}
