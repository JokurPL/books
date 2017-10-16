@extends('books.layout.layout')
@section('content')
    <div class="container">
    <h1 style="margin: 1rem;">Edytuj kategorie</h1>
    <form method="post" action="{{ route('books.cat_e_save', $cat) }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="name">Nowa nazwa kategorii [Aktualna: <b>{{ $cat->name }}</b>]</label>
            <input type="text" value="{{ $cat->name }}" class="form-control" name="name" id="name" placeholder="Wpisz nazwę kategorii">
        </div>
        <button type="submit" style="cursor: pointer;" class="btn btn-success">Edytuj</button>
    </form>
    </div>
@endsection