@extends('books.layout.layout')
@section('title') {{$user->name }} -  @endsection
@section('content')
    <div class="container">
        <div class="jumbotron" style="margin-top: 1rem;">
            <div class="row">
                <div class="col-sm-2 text-center">
                    <h1>{{ $user->name }}</h1>
                    <img width="100%" class="img-thumbnail" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" alt="">
                </div>
                <div class="col-sm-10">
                    <h1 class="text-center">O użytkowniku</h1>
                    <hr>
                    <div class="row">
                    <div class="col-sm-6 text-center">
                        <h4>Lubione książki (<span class="text-success">{{Count($like_books)}}</span>)</h4>
                        <hr>
                            @foreach($like_books as $value)
                             <p><a href="{{ route('books.single', $value->books) }}">{{ $value->books->title }}</a><hr></p>
                            @endforeach
                    </div>
                    <div class="col-sm-6 text-center">
                        <h4>Nielubione książki (<span class="text-success">{{Count($dislike_books)}}</span>)</h4>
                        <hr>
                        @foreach($dislike_books as $value)
                            <p><a href="{{ route('books.single', $value->books) }}">{{ $value->books->title }}</a><hr></p>
                        @endforeach
                    </div>
                    </div>
                    <hr>
                </div>
                <div class="col-sm-12">
                    <h1 class="text-center">Komentarze (<span class="text-success">{{Count($comments)}}</span>)</h1>
                    <hr>
                @foreach($comments as $value)
                        <blockquote style="padding: 1rem;" class="blockquote border border-primary">
                            <span class="text-secondary">Komentarz do książki: <a class="text-primary" href="{{ route('books.single', $value->books) }}">{{ $value->books->title }}</a></span>
                            <p class="mb-0" style="font-size: 1rem; text-align: left">{{ $value->comment}}</p>
                            <span class="text-secondary" style="font-size: 70%;">Dodany: <b>{{$value->created_at}}</b></span>
                        </blockquote>
                @endforeach
                    <nav class="mx-auto" aria-label="Page navigation example">
                        {{$comments->links('vendor.pagination.bootstrap-4')}}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection
