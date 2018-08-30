<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function question()
    {
        return $this->hasMany('App\Question');
    }

    public function comment()
    {
        return $this->hasMany('App\comment');
    }
}
