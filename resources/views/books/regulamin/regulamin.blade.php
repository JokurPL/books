@extends('books.layout.layout')
@section('content')
    <div class="container">
        <h1 class="text-center" style="margin: 1rem;">Regulamin</h1>
        <hr>
        <div class="content">
            {!! $regulamin->content !!}
        </div>
    </div>
@endsection