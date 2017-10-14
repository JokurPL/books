@extends('books.layout.layout')
@section('content')
    <div style="margin: 1rem;" class="text-center">
        <h1>Panel Administratora</h1>
        <hr>
        <p style="font-size: 2rem">Witaj w panelu administratora, <b>{{ Auth::user()->name }}!</b></p>
        <p style="font-size: 2rem">Dzisiaj jest <i>{{ date('d.'.'m.'.'Y')}}r.</i></p>
        <hr>
        <h1 style="font-size: 4rem">Książki</h1>
        <hr>
    </div>
    <table class="table table-responsive table-inverse text-center table-striped table-bordered" id="tabelka">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Tytuł książki</th>
            <th class="text-center">Opis</th>
            <th class="text-center">Autor</th>
            <th class="text-center">Plusy</th>
            <th class="text-center">Minusy</th>
            <th class="text-center">Edytuj</th>
            <th class="text-center">Usuń</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th class="text-center">{{$book->id}}</th>
                <td>{{$book->title}}</td>
                <td><details style="cursor: pointer">
                        <summary>Opis (kliknij, aby zobaczyć)</summary>
                        {!! $book->desc !!}
                    </details>
                </td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->plus}}</td>
                <td>{{ $book->minus}}</td>
                <td><a href="" class="btn btn-success">Edytuj</a></td>
                <td><a href="" class="btn btn-danger">Usuń</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection