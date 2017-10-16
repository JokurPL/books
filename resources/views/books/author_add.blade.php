@extends('books.layout.layout')
@section('content')
    <div class="container">
    <h1 style="margin: 1rem;">Dodaj autora</h1>
    <form method="post" action="{{ route('books.author_save') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Imię i nazwisko autora</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Wpisz imię i nazwisko autora">
        </div>
        <button style="cursor: pointer;" type="submit" class="btn btn-primary">Dodaj</button>
    </form>
    </div>
@endsection