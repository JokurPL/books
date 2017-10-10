@extends('books.layout.layout')
@section('content')

    @foreach($cat as $c)
        <p>
            <h1>Książki autorstwa: <i>{{$c->name}}</i></h1>
        </p>
    @endforeach
    <div class="row mx-auto">
    @foreach($books as $book)

        <div class="card float-left mx-auto post" style="width: 20rem; margin: 1rem;">
            <img class="card-img" width="50px" src="../uploads/{{$book->img}}" alt="Card image cap">
            <div class="card-body text-center">
                <h4 class="card-title ">{{$book->title}}</h4><a href="{{route('books.category', $book->categories->id)}}"><button type="button" class="btn btn-outline-info btn-info">{{$book->categories->name}}</button></a> <button type="button" class="btn btn-outline-secondary" style="margin: 2%;">{{$book->author->name}}</button>
                </p>
                <a href="{{ route('books.single', $book) }}" class="btn btn-primary">Szczegóły</a>
            </div>
        </div>

    @endforeach
    </div>
@endsection