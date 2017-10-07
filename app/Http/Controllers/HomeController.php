<?php

namespace App\Http\Controllers;

use App\Author;
use App\Books;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as Input;

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

    public function save(Request $request) {
        $file = Input::file('img');
        $file->move('uploads', $file->getClientOriginalName());
        $books = new Books();
        $books->title = $request->title;
        $books->categories_id = $request->categories_id;
        $books->author_id = $request->author_id;
        $books->img = $file->getClientOriginalName();
        $books->save();
        return redirect()->route('books.index');
    }

}
