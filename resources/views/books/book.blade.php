@extends('books.layout.layout')
@section('title'){{$book->title}} - @endsection
@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-sm-4 center-block">
                <img src="../uploads/{{$book->img}}" class="img-fluid" style="margin-top: 1rem;" height="60%" alt="Zdjęcie {{$book->title}}"/>
                <a href="{{ URL::previous() }}" style="margin: 1rem;" class="btn btn-primary btn-lg">Powrót</a>
            </div>
            <div class="col-sm-8 text-center" style="margin-top: 1rem;">
                <h1>{{$book->title}} </h1>
                <h4 class="text-secondary"><i>{{$book->author->name}}</i></h4>
                <hr>
                <div>
                    <p>{!! $book->desc !!}</p>
                </div>
                <hr>

                <div class="text-right grades">
                    <p>Kategoria: <a class="text-right" href="{{ route('books.category', $book->categories->id) }}">{{$book->categories->name}}</a></p>
                    <h2 style="margin-right: 2rem;">Ocena</h2>
                    @if(!Auth::guest())
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
                        <button style="cursor: pointer;" class="btn btn-danger" style="cursor: pointer;"><p><b><i class="material-icons">thumb_down</i></b></p>{{ $d_votes }}</button>
                    </form>
                    @elseif($ok_up === true)
                        <div class="d-inline-block" style="margin-right: 1rem">
                            <button style="cursor: pointer;" class="btn btn-success disabled"><p><b><i class="material-icons">thumb_up</i></b></p> {{ $u_votes }}</button>
                        </div>
                        <form method="post" action="{{ route('books.stop_up_vote') }}" class="d-inline-block" style="margin-right: 1rem">
                            {{csrf_field()}}
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="books_id" value="{{$book->id}}">
                            <input type="hidden" name="ok" value="{{$ok_up}}">
                            <input type="hidden" name="ok_d" value="{{$ok_d}}">
                            <button style="cursor: pointer;" class="btn btn-danger"><p><b><i class="material-icons">thumb_down</i></b></p>{{ $d_votes }}</button>
                        </form>
                        @elseif($ok_d = true)
                        <form method="post" action="{{ route('books.stop_down_vote') }}" class="d-inline-block" style="margin-right: 1rem">
                            {{csrf_field()}}
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="books_id" value="{{$book->id}}">
                            <input type="hidden" name="ok" value="{{$ok_up}}">
                            <input type="hidden" name="ok_d" value="{{$ok_d}}">
                            <button  style="cursor: pointer;" class="btn btn-success"><p><b><i class="material-icons">thumb_down</i></b></p>{{ $u_votes }}</button>
                        </form>
                        <div class="d-inline-block" style="margin-right: 1rem">
                            <button style="cursor: pointer;" class="btn btn-danger disabled"><p><b><i class="material-icons">thumb_down</i></b></p>{{ $d_votes }}</button>
                        </div>

                    @endif


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
            </div>
                @else
                    <div class="d-inline-block" style="margin-right: 1rem">
                        <button data-toggle="tooltip" data-placement="left" title="Chcesz zagłosować? Zaloguj lub zajerestruj się!" class="btn btn-success disabled"><p><b><i class="material-icons">thumb_up</i></b></p> {{ $l_uvotes }}</button>
                    </div>
                    <div class="d-inline-block" style="margin-right: 1rem">
                        <button data-toggle="tooltip" data-placement="left" title="Chcesz zagłosować? Zaloguj lub zajerestruj się!" class="btn btn-danger disabled"><p><b><i class="material-icons">thumb_up</i></b></p> {{ $l_dvotes }}</button>
                    </div>

                @endif
            </div>
            <hr>
            <h1>Komentarze</h1>
            <hr>
            @foreach($comments as $value)
            <blockquote style="padding: 1rem;" class="blockquote border border-primary">
                <p class="mb-0" style="font-size: 1rem; text-align: left">{{ $value->comment}}</p>
                <footer class="blockquote-footer text-left"><a href="{{ route('books.user', $value->user) }}">{{ $value->user->name}}</a></footer>
                <span class="text-secondary" style="font-size: 70%;">Dodany: <b>{{$value->created_at}}</b></span>
            </blockquote>

            @endforeach
        <nav class="mx-auto" aria-label="Page navigation example">
            {{$comments->links('vendor.pagination.bootstrap-4')}}
        </nav>
            <hr>
            <h2>Dodaj komentarz</h2>
            @if(!Auth::guest())
            <form action="{{ route('books.add_comment') }}" method="post">
                <div class="form-group">
                    <label for="comment">Treść komentarza</label>
                    {{ csrf_field() }}
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="books_id" value="{{$book->id}}">
                    <textarea required class="form-control" id="comment" name="comment" rows="6"></textarea>
                    <button class="btn btn-info text-left" style="cursor: pointer;margin-top: 1rem; margin-right: 80%;">Dodaj komentarz</button>
                </div>
            </form>
                @else
                <div class="form-group">
                    <label for="comment">Treść komentarza</label>
                    <textarea  style="cursor: not-allowed"; class="form-control disabled" id="comment" name="comment" rows="6"></textarea>
                    <button data-toggle="tooltip" data-placement="left" title="Chcesz dodać komentarz? Zaloguj lub zajerestruj się!" class="btn btn-info text-left disabled" style="cursor: not-allowed;margin-top: 1rem; margin-right: 80%;">Dodaj komentarz</button>
                </div>
            @endif
            </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection