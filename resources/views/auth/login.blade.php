@extends('books.layout.layout')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6">
                <form method="POST" action="{{ url('/login') }}" class="form-horizontal" style="margin: 5rem;" role="form" >
                    {!! csrf_field() !!}
                    <h1>Zaloguj się</h1>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><h4>Adres e-mail</h4></label>
                        <input type="email" name="email" required class="form-control" id="email" aria-describedby="emailHelp" placeholder="Wpisz swój e-mail">
                        <small id="emailHelp" class="form-text text-muted">Pamiętaj, aby e-mail był prawdziwy!</small>
                    </div>
                    <div class="form-group">
                        <label for="password"><h4>Hasło</h4></label>
                        <input type="password" name="password" required class="form-control" id="password" placeholder="Hasło">
                    </div>
                    <button type="submit" style="cursor: pointer;" class="btn btn-lg btn-primary">Zaloguj się</button>
                </form>
            </div>
            <div class="col-sm-6">
                <form style="margin: 5rem;" method="POST" action="{{ route('books.register') }}">
                    {{csrf_field()}}
                    <h1>Zarejestruj się</h1>
                    <hr>
                    <div class="form-group">
                        <label for="name"><h4>Nazwa użytkownika</h4></label>
                        <input type="text" name="name" required class="form-control" id="name" placeholder="Wpisz swój nick">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong class="">{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><h4>Adres e-mail</h4></label>
                        <input type="email" name="email" required class="form-control" id="email" aria-describedby="emailHelp" placeholder="Wpisz swój e-mail">
                        <small id="emailHelp" class="form-text text-muted">Pamiętaj, aby e-mail był prawdziwy!</small>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password"><h4>Hasło</h4></label>
                        <input type="password" name="password" required class="form-control" id="password" placeholder="Hasło">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password2"><h4>Powtórz hasło</h4></label>
                        <input type="password" required name="password_confirmation" class="form-control" id="password2" placeholder="Powtórz hasło">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" required class="form-check-input">
                            Zapoznałem się z <a href>regulaminem</a>.
                        </label>
                    </div>

                    <input type="hidden" name="user_id" value="{{ \App\User::all()->last()->id+1 }}">
                    
                    <button type="submit" style="cursor: pointer;" class="btn btn-lg btn-primary">Zarejestruj się</button>
                </form>
            </div>
        </div>
    </div>
@endsection