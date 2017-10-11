<?php

namespace App\Http\Controllers;

use App\Author;
use App\Books;
use App\Categories;
use App\Http\Requests\BooksRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function plus(Request $request, $id) {
        $books = Books::find($id);
        $user = User::find(Auth::user()->id);
        $books->plus = $request->plus;
        $user->save();
        $books->save();
        return redirect()->route('books.single', $books);
    }

    public function minus(Request $request, $id) {
        $books = Books::find($id);
        $user = User::find(Auth::user()->id);
        $books->minus = $request->plus;
        $user->save();
        $books->save();
        return redirect()->route('books.single', $books);
    }

}
