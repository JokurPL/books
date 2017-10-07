@extends('books.layout.layout')
    @section('content')
        <h1 class="text-center" style="margin: 1rem;">Popularne książki</h1>
        <hr>
        <div class="row mx-auto">
            @foreach($books as $book)

                {{--@foreach($cat = DB::table('categories')->where('id', $book->category)->get() as $cate)--}}
            <div class="card float-left mx-auto post" style="width: 20rem; margin: 1rem;">
                <img class="card-img" width="50px" src="uploads/{{$book->img}}" alt="Card image cap">
                <div class="card-body text-center">
                    <h4 class="card-title ">{{$book->title}}</h4><a href><button type="button" class="btn btn-outline-info btn-info">{{$book->categories->name}}</button></a> <button type="button" class="btn btn-outline-secondary" style="margin: 2%;">{{$book->author->name}}</button>
                    </p>
                    <a href="{{ route('books.single', $book) }}" class="btn btn-primary">Szczegóły</a>
                </div>
            </div>
                    @endforeach
            {{--@endforeach--}}
            <nav class="mx-auto" aria-label="Page navigation example">
                {{$books->links('vendor.pagination.bootstrap-4')}}
            </nav>

        </div>
    @endsection