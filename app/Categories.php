<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
       'name'
    ];

    public function books() {
        return $this->belongsTo('App\Books', 'name');
    }
}
