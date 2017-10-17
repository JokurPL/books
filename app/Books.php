<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'title',
        'author',
        'category',
        'img',
        'created_at',
        'updated_at'
    ];

    public function categories() {
        return $this->hasOne('App\Categories', 'id', 'categories_id');
    }

    public function author() {
        return $this->hasOne('App\Author', 'id', 'author_id');
    }


    public function downVote() {
        return $this->hasOne('App\DownVote', 'id', 'books_id');

    }

    public function upvote() {
        return $this->hasOne('App\Upvote', 'id', 'books_id');

    }

    public function comments() {
        return $this->hasOne('App\Comments', 'id', 'books_id');
    }

}
