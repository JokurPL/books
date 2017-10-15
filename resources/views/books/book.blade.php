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
                    <p>{!! $book->desc !!}</p>
                </div>
                <hr>

                <div class="text-right grades">
                    <p>Kategoria: <a class="text-right" href="{{ route('books.category', $book->categories->id) }}">{{$book->categories->name}}</a></p>
                    <h2 style="margin-right: 2rem;">Ocena</h2>
                    @if($ok_up === false && $ok_d === false)

                    <form  method="post" action="{{ route('books.up_vote') }}" class="d-inline-block" style="margin-right: 1rem">
                        {{csrf_field()}}
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="books_id" value="{{$book->id}}">
                        <input type="hidden" name="ok" value="{{$ok_up}}">
                        <input type="hidden" name="ok_d" value="{{$ok_d}}">
                        <button style="cursor:pointer;" id="plus" class="btn btn-success"><p><i class="material-icons">thumb_up</i></p><div>{{ $u_votes }}</div></button>
                    </form>
                    <form action="{{ route('books.down_vote')  }}" method="post" class="d-inline-block" style="margin-right: 1rem">
                        {{csrf_field()}}
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="books_id" value="{{$book->id}}">
                        <input type="hidden" name="ok" value="{{$ok_up}}">
                        <input type="hidden" name="ok_d" value="{{$ok_d}}">
                        <button class="btn btn-danger" style="cursor: pointer;"><p><b><i class="material-icons">thumb_down</i></b></p>{{ $d_votes }}</button>
                    </form>
                    @elseif($ok_up === true)
                        <div class="d-inline-block" style="margin-right: 1rem">
                            <button class="btn btn-success disabled"><p><b><i class="material-icons">thumb_up</i></b></p> {{ $u_votes }}</button>
                        </div>
                        <form method="post" action="{{ route('books.stop_up_vote') }}" class="d-inline-block" style="margin-right: 1rem">
                            {{csrf_field()}}
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="books_id" value="{{$book->id}}">
                            <input type="hidden" name="ok" value="{{$ok_up}}">
                            <input type="hidden" name="ok_d" value="{{$ok_d}}">
                            <button class="btn btn-danger"><p><b><i class="material-icons">thumb_down</i></b></p>{{ $d_votes }}</button>
                        </form>
                        @elseif($ok_d = true)
                        <form method="post" action="{{ route('books.stop_down_vote') }}" class="d-inline-block" style="margin-right: 1rem">
                            {{csrf_field()}}
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="books_id" value="{{$book->id}}">
                            <input type="hidden" name="ok" value="{{$ok_up}}">
                            <input type="hidden" name="ok_d" value="{{$ok_d}}">
                            <button class="btn btn-success"><p><b><i class="material-icons">thumb_down</i></b></p>{{ $u_votes }}</button>
                        </form>
                        <div class="d-inline-block" style="margin-right: 1rem">
                            <button class="btn btn-danger disabled"><p><b><i class="material-icons">thumb_down</i></b></p>{{ $d_votes }}</button>
                        </div>
                    @endif
                </div>

                @if(!Auth::guest())
                @if(Auth::user()->roles[0]->name === 'Administrator' || Auth::user()->roles[0]->name === 'Redaktor')
                <div style="text-align: right; margin: 1rem;">
                    <a style="margin: 1rem; float: left;" href="{{ route('books.edit', $book) }}" class="btn btn-info text-right btn-lg">Edytuj</a>
                    <form action="{{ route('books.destroy', $book) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" >
                        <button style="margin: 1rem; cursor: pointer;" class="btn btn-danger text-right btn-lg">Usuń</button>
                    </form>
                </div>
                @endif
                @endif
            </div>
            <a href="{{ URL::previous() }}" style="margin: 1rem;" class="btn btn-primary btn-lg">Powrót</a>
        </div>

@endsection
@section('scripts')

    <script>
        $('#plus').click(function () {
            $('#plus').addClass("disabled");
        });
    </script>

@endsection