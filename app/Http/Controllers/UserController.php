<?php

namespace App\Http\Controllers;

use App\Comments;
use App\DownVote;
use App\Roles;
use App\Upvote;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(User $user) {
        $like_books = Upvote::where('users_id', '=', $user->id)->get();
        $dislike_books = DownVote::where('users_id', '=', $user->id)->get();
        $comments = Comments::where('users_id', '=', $user->id)->orderBy('id','desc')->paginate(5);
        return view('books.users.user', compact('user', 'like_books', 'dislike_books', 'comments'));
    }

}
