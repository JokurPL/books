<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownVote extends Model
{

    public function user() {
        return $this->belongsTo('App\User', 'name');
    }

    public function books() {
        return $this->hasOne('App\Books', 'id', 'books_id');
    }
}
