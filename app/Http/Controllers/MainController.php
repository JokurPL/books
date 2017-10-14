<?php

namespace App\Http\Controllers;

use App\Books;
use App\Categories;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{


    public function index() {
        $books = Books::paginate(15);
        return view('books.welcome', compact('books'));
    }

    public function single(Books $book) {
        return view('books.book', compact('book'));
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
        $books = Books::all();
        return view('books.panel', compact('books'));
    }

    public function all_books() {
        return view('books.panel_all');
    }

}
