@extends('books.layout.layout')
@section('content')
    <div style="text-align: center; margin: 10rem; padding: 0;" class="align-middle">
        <h1 style=" font-size: 5rem;" class="text-danger">Ups... coś poszło nie tak (404)</h1>
        <p><a href="{{ route('home') }}" style="margin: 1rem; font-size: 2rem;">Powrót do strony głównej</a></p>
    </div>
@endsection