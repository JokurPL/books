<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    public function books() {
        return $this->hasOne('App\Books', 'id', 'books_id');
    }
    public function user() {
        return $this->hasOne('App\User', 'id', 'users_id');
    }

}
