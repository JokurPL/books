@extends('books.layout.layout')
@section('content')
    <div class="container">
    <h1 style="margin: 1rem;">Dodaj kategorie</h1>
    <form method="post" action="{{ route('books.cat_save') }}">

        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nazwa kategorii</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Wpisz nazwę kategorii">
        </div>
        <button style="cursor: pointer;" type="submit" class="btn btn-primary">Dodaj</button>
    </form>
    </div>
@endsection