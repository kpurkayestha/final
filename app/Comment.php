<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function question_user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment_user()
    {
        return $this->belongsTo('App\User');
    }
}
