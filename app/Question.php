<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

	public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function vote()
    {
        return $this->hasOne('App\Vote');
    }

}
