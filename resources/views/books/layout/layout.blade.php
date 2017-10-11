<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title'){{ config('app.name', 'eKsięgarnia') }}</title>
    <link rel="icon" type="image/png" href="http://www.freeiconspng.com/uploads/book-icon--icon-search-engine-6.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script type="text/javascript" src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=jrjc7e0xuvmi98ya39hwwcxx2jw0x6qmyo9fguc0c3ue4pg1"></script>
    <script>
        tinymce.init({
            selector: '#desc',
            language: 'pl'
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'eKsięgarnia') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Wszystkie książki</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bestsellery</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategorie
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($cate = DB::table('categories')->get() as $cat)
                            <a class="dropdown-item" href="{{ route('books.category', $cat->id) }}">{{$cat->name}}</a>
                        @endforeach
                    </div>
                </li>

            </ul>
                <ul class="navbar-nav">
                    @if(!Auth::guest())
                        @if(Auth::user()->roles[0]->name === 'Administrator' || Auth::user()->roles[0]->name === 'Redaktor')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{  Auth::user()->name  }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="">xd</a>
                        </div>
                    </li>
                        @endif
                    @endif
                    @if(Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Zaloguj się</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Zajerestruj się</a>
                    </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Wyloguj się
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js"></script>
    @yield('scripts')
</body>
</html>