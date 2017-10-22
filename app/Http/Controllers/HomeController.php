<?php

namespace App\Http\Controllers;

use App\Author;
use App\Books;
use App\Categories;
use App\Comments;
use App\DownVote;
use App\Http\Requests\BooksRequest;
use App\Regulamin;
use App\Upvote;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Session;
use function MongoDB\BSON\toJSON;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit_regulamin(Regulamin $regulamin)
    {
        return view('books.regulamin.edit_regulamin', compact('regulamin'));
    }

    public function save_edit_regulamin(Request $request, Regulamin $regulamin)
    {
        $reg = Regulamin::find($request->id);
        $reg->content = $request->content;
        $reg->save();
        return redirect()->route('books.regulamin');
    }

    public function index()
    {
        $category = Categories::all();
        $author = Author::all();
        return view('home', compact('category', 'author'));
    }

    public function save_cat(Request $request) {
        $cat = new Categories();
        $cat->name = $request->category;
        $cat->save();

        return redirect()->route('addbook');
    }

    public function save(Request $request) {
        $file = Input::file('img');
        $file->move('uploads', $file->getClientOriginalName());
        $books = new Books();
        $books->title = $request->title;
        $books->categories_id = $request->categories_id;
        $books->author_id = $request->author_id;
        $books->img = $file->getClientOriginalName();
        $books->desc = $request->desc;
        $books->save();
        return redirect()->route('home');
    }


    public function up_vote(Request $request)
    {
        $up_vote = new Upvote();
        $up_vote->books_id = $request->books_id;
        $up_vote->users_id = $request->users_id;
        $up_vote->vote += 1;
        $up_vote->save();

        return redirect()->route('books.single', $request->books_id);
    }

    public function down_vote(Request $request)
    {
        $down_vote = new DownVote();
        $down_vote->books_id = $request->books_id;
        $down_vote->users_id = $request->users_id;
        $down_vote->vote += 1;
        $down_vote->save();

        return redirect()->route('books.single', $request->books_id);
    }
    public function book_edit(Books $book)
    {
        $cats = Categories::all();
        $authors = Author::all();
        return view('books.edit', compact('book', 'cats', 'authors'));
    }

    public function book_update(Request $request, Books $book)
    {
        $book->title = $request->title;
        $book->desc = $request->desc;
        $book->categories_id = $request->categories_id;
        $book->author_id = $request->author_id;
        if($file = Input::file('img') == null) {
            $book->img = $request->oldimg;
        }
        else {

            $file = Input::file('img');
            $file->move('uploads', $file->getClientOriginalName());
            $book->img = $file->getClientOriginalName();
        }
        $book->save();
        return redirect()->route('books.single', $book);
    }

    public function book_destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('home');
    }

    public function cat_add()
    {
        return view('books.cat_add');
    }

    public function cat_save(Request $request)
    {
        $cat = new Categories();
        $cat->name = $request->name;
        $cat->save();

        return redirect()->route('books.panel_admina');
    }

    public function cat_edit(Categories $cat)
    {

        return view('books.cat_edit', compact('cat'));
    }

    public function cat_e_save(Request $request, Categories $cat)
    {
        $cat->name = $request->name;
        $cat->save();
        return redirect()->route('books.panel_admina');
    }

    public function cat_destroy(Categories $cat)
    {
        $cat->delete();
        return redirect()->route('books.panel_admina');
    }

    public function author_add()
    {
        return view('books.author_add');
    }

    public function author_save(Request $request)
    {
        $author = new Author();
        $author->name = $request->name;
        $author->save();

        return redirect()->route('books.panel_admina');
    }

    public function author_edit(Author $author)
    {
        return view('books.author_edit', compact('author'));
    }

    public function author_e_save(Request $request, Author $author)
    {
        $author->name = $request->name;
        $author->save();
        return redirect()->route('books.panel_admina');
    }

    public function author_destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('books.panel_admina');
    }

    public function stop_up_vote(Request $request)
    {
        $vote = DB::table('upvotes')->where('books_id', $request->books_id)->get();
        foreach ($vote as $value) {
            if ($value->users_id === $request->users_id) {
                return redirect()->route('books.single', $request->books_id);
            } else {
                $lol = DB::table('upvotes')->where('books_id', '=', $request->books_id)->where('users_id', '=', $request->users_id)->delete();
                $down_vote = new DownVote();
                $down_vote->books_id = $request->books_id;
                $down_vote->users_id = $request->users_id;
                $down_vote->vote += 1;
                $down_vote->save();
                return redirect()->route('books.single', $request->books_id);
            }
        }
    }

    public function stop_down_vote(Request $request)
    {
        $vote = DB::table('down_votes')->where('books_id', $request->books_id)->get();
        foreach ($vote as $value) {
            if ($value->users_id === $request->users_id) {
                return redirect()->route('books.single', $request->books_id);
            } else {
                $lol = DB::table('down_votes')->where('books_id', '=', $request->books_id)->where('users_id', '=', $request->users_id)->delete();
                $down_vote = new Upvote();
                $down_vote->books_id = $request->books_id;
                $down_vote->users_id = $request->users_id;
                $down_vote->vote += 1;
                $down_vote->save();
                return redirect()->route('books.single', $request->books_id);
            }
        }
    }

    public function add_comment(Request $request)
    {
        $comment = new Comments();
        $comment->users_id = $request->users_id;
        $comment->books_id = $request->books_id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->route('books.single', $request->books_id);
    }
}
