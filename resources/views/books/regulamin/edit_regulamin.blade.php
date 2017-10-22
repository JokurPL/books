@extends('books.layout.layout')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('books.save_edit_regulamin', $regulamin) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{$regulamin->id}}">
            <div class="form-group">
                <label for="content">Opis książki</label>
                <textarea  class="form-control" name="content" id="content" placeholder="Wpisz regulamin">{{ $regulamin->content }}</textarea>
            </div>
            <button type="submit" style="cursor: pointer;" class="btn btn-success">Edytuj</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{url('../js/languages/pl.js')}}"></script>
    <script>
        $(function() {
            $('textarea').froalaEditor({
                heightMin: 1000,
                language: 'pl'
            })
        });
    </script>

@endsection