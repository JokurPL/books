@extends('books.layout.layout')
@section('content')
    <div class="container">
    <h1 style="margin: 1rem">Edytuj książkę</h1>
    <hr>
    <form style="margin: 2rem;" action="{{ route('books.update', $book) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Tytuł książki</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Nowy tytuł książki" value="{{$book->title}}">
        </div>
        <div class="form-group">
            <label for="desc">Opis książki</label>
            <textarea  class="form-control" name="desc" id="desc" placeholder="Nowy opis książki">{{ $book->desc }}
            </textarea>
        </div>
        <div class="form-group">
            <label for="categories">Kategoria [Aktualna: <b>{{ $book->categories->name }}</b>]</label>
            <select name="categories_id" class="form-control" id="categories_id">
                @foreach($cats as $cat)
                    <option @if($cat->id === $book->categories->id) selected @endif name="categories_id" value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="author_id">Autor [Aktualny: <b>{{ $book->author->name }}</b>]</label>
            <select name="author_id" class="form-control" id="author_id">
                @foreach($authors as $author)
                    <option @if($author->id === $book->categories->id) selected @endif name="author_id" value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="img">Zdjęcie</label>
            <input type="file" name="img" class="form-control-file"      id="img">
            <input type="hidden" value="{{$book->img}}" name="oldimg">
            <a href="{{asset('../uploads/')}}/{{$book->img}}"><img width="150" style="margin: 1rem"  data-lightbox="image-1" data-title="My caption" class="" src="{{asset('../uploads/')}}/{{$book->img}}" alt="Akutalne zdjęcie"></a>
        </div>
        <button class="btn btn-success btn-lg">Edytuj</button>
    </form>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ url('/js/languages/pl.js') }}"></script>
    <script>
        $(function() {
            $('textarea').froalaEditor({ heightMin: 100,
                heightMin: 500,
                language: 'pl'
            })
        });
    </script>

@endsection