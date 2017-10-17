<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{

    public function user() {
        return $this->belongsTo('App\User', 'name');
    }

    public function books() {
        return $this->hasOne('App\Books', 'id', 'books_id');
    }
}
