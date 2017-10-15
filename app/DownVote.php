<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownVote extends Model
{
    protected $fillable = [
        'name'
    ];

    public function books() {
        return $this->belongsTo('App\Books');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }
}