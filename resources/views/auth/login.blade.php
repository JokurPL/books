@extends('books.layout.layout')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-sm-6">
            <form class="form-horizontal" style="margin: 5rem;" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}
        <h1>Zaloguj się</h1>
        <hr>
        <div class="form-group">
            <label for="exampleInputEmail1"><h4>Adres e-mail</h4></label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Wpisz swój e-mail">
            <small id="emailHelp" class="form-text text-muted">Pamiętaj, aby e-mail był prawdziwy!</small>
        </div>
        <div class="form-group">
            <label for="password"><h4>Hasło</h4></label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Hasło">
        </div>
        <button type="submit" style="cursor: pointer;" class="btn btn-lg btn-primary">Zaloguj się</button>
    </form>
        </div>
        <div class="col-sm-6">
            <form style="margin: 5rem;">
                <h1>Zarejestruj się</h1>
                <hr>
                <div class="form-group">
                    <label for="exampleInputEmail1"><h4>Adres e-mail</h4></label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Wpisz swój e-mail">
                    <small id="emailHelp" class="form-text text-muted">Pamiętaj, aby e-mail był prawdziwy!</small>
                </div>
                <div class="form-group">
                    <label for="password"><h4>Hasło</h4></label>
                    <input type="password" class="form-control" id="password" placeholder="Hasło">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Zapoznałem się z <a href>regulaminem</a>.
                    </label>
                </div>
                <button type="submit" style="cursor: pointer;" class="btn btn-lg btn-primary">Zarejestruj się</button>
            </form>
        </div>
    </div>
</div>
@endsection
