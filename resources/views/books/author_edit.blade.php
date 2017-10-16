@extends('books.layout.layout')
@section('content')
    <div class="container">
    <h1 style="margin: 1rem;">Edytuj autora</h1>
    <form method="post" action="{{ route('books.author_e_save', $author) }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="name">Nowa nazwa kategorii [Aktualna: <b>{{ $author->name }}</b>]</label>
            <input type="text" value="{{ $author->name }}" class="form-control" name="name" id="name" placeholder="Wpisz nową nazwę autora">
        </div>
        <button type="submit" style="cursor: pointer;" class="btn btn-success">Edytuj</button>
    </form>
    </div>
@endsection