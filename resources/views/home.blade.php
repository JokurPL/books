@extends('books.layout.layout')

@section('content')
    <br>
    <form method="post" action="{{route('books.save')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Nazwa książki</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Wpisz nazwę książki">
        </div>
        <div class="form-group">
            <label for="categories">Kategoria</label>
            <select name="categories_id" class="form-control" id="categories_id">
                @foreach($category as $cat)
                    <option name="categories_id" value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="author_id">Autor</label>
            <select name="author_id" class="form-control" id="author_id">
                @foreach($author as $a)
                    <option name="author_id" value="{{$a->id}}">{{$a->name}}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group">
                <label for="img">Zdjęcie</label>
                <input type="file" name="img" class="form-control-file" id="img">
            </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
@endsection
