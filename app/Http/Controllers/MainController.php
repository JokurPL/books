<?php

namespace App\Http\Controllers;

use App\Books;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {
        $books = Books::paginate(15);

        return view('books.welcome', compact('books'));
    }

    public function single(Books $book) {
        return view('books.book', compact('book'));
    }

}
