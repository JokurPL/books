@extends('books.layout.layout')
@section('title'){{$book->title}} - @endsection
@section('content')


        <div class="row mx-auto">
            <div class="col-sm-4 center-block">
                <img src="../uploads/{{$book->img}}" class="img-fluid" style="margin-top: 1rem;" height="60%" alt="Zdjęcie {{$book->title}}"/>
            </div>
            <div class="col-sm-8 text-center" style="margin-top: 1rem;">
                <h1>{{$book->title}}</h1>
                <h4 class="text-secondary"><i>{{$book->author->name}}</i></h4>
                <hr>
                <div>
                    <p>{{$book->desc}}</p>
                </div>
                <hr>
                <div class="text-right grades">
                    <h2 style="margin-right: 2rem;">Ocena</h2>
                    <form  method="post" action="" class="d-inline-block" style="margin-right: 1rem">
                        {{csrf_field()}}
                        <input type="hidden" name="plus" value="">
                        <button style="cursor:pointer;" id="plus" class="btn btn-success"><p><i class="material-icons">thumb_up</i></p><div>{{$book->plus}}</div></button>
                    </form>
                    <form action="post" action="" class="d-inline-block" style="margin-right: 1rem">
                        {{csrf_field()}}
                        <input type="hidden" name="minus" value="">
                        <button class="btn btn-danger"><p><b><i class="material-icons">thumb_down</i></b></p>{{$book->minus}}</button>
                    </form>
                </div>
            </div>
            <a href="{{ route('books.index') }}" style="margin: 1rem;" class="btn btn-primary btn-lg">Powrót</a>
        </div>

@endsection
@section('scripts')

    <script>
        $('#plus').click(function () {
            $('#plus').addClass("disabled");
        });
    </script>

@endsection