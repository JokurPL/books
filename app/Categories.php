<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
       'name'
    ];

    public function books() {
        return $this->hasOne('App\Books', 'id', 'books_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'name');
    }
}
