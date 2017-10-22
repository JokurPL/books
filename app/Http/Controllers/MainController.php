<?php

namespace App\Http\Controllers;

use App\Author;
use App\Books;
use App\Categories;
use App\Comments;
use App\Regulamin;
use App\Roles;
use App\Upvote;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{


    public function index() {
        $books = Books::paginate(15);
        return view('books.welcome', compact('books'));
    }

    public function regulamin()
    {
        $regulamin = Regulamin::first();
        return view('books.regulamin.regulamin', compact('regulamin'));
    }

    public function single(Books $book) {
        $upvote = DB::table('upvotes')->where('books_id', $book->id)->get();
        $downvote = DB::table('down_votes')->where('books_id', $book->id)->get();
        $comments = Comments::where('books_id', '=', $book->id)->orderBy('id', 'desc')->paginate(5);
        $roles = Roles::all();
        $l_uvotes = 0;
        foreach ($upvote as $vote) {
            $l_uvotes += $vote->vote;
        }
        $l_dvotes = 0;
        foreach ($downvote as $vote) {
            $l_dvotes += $vote->vote;
        }
        $u_votes = 0;
        $d_votes = 0;
        $ok_up = false;
        $ok_d = false;
        if (!Auth::guest()) {
            foreach ($upvote as $vote) {
                $u_votes += $vote->vote;
                $users = $vote->users_id;
                $u_id = $vote->id;
                if ($users === Auth::user()->id) {
                    $ok_up = true;
                } else {
                    $ok_up = false;
                }
            }
            foreach ($downvote as $vote) {
                $d_votes += $vote->vote;
                $users = $vote->users_id;
                $d_id = $vote->id;
                if ($users === Auth::user()->id) {
                    $ok_d = true;
                } else {
                    $ok_d = false;
                }
            }
        }
        return view('books.book', compact('book', 'roles','comments','u_votes', 'ok_up', 'ok_d', 'd_votes', 'u_id', 'd_id', 'db', 'l_uvotes', 'l_dvotes'));
    }

    public function category($category) {
        $books = Books::where('categories_id', $category)->get();
        $cat = DB::table('categories')->where('id', $category)->get();
        return view('books.categories', compact('books', 'cat'));
    }

    public function sauthor($author) {
        $books = Books::where('author_id', $author)->get();
        $cat = DB::table('authors')->where('id', $author)->get();
        return view('books.author', compact('books', 'cat'));
    }

    public function panel() {
        $books = Books::paginate(10);
        $categories = Categories::paginate(10);
        $author = Author::paginate(10);
        $comments = Comments::paginate(10);
        return view('books.panel', compact('books', 'categories', 'author', 'comments'));
    }

    public function all_books() {
        return view('books.panel_all');
    }

    public function destroy_comment(Comments $comment)
    {
        $comment->delete();

        return redirect()->route('books.panel_admina');
    }
}
