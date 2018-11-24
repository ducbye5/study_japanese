<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    </head>
    <body>
        <div class="container">
            @if (Route::has('login'))
                <div class="col-md-12">
                    @auth
                        <a class="btn btn-primary" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="col-md-12">
                <div class="row pt-3">
                    <div class="col-md-12 text-center">
                        <hr>
                        <h3>STUDY JAPANESE</h3>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-outline-danger" href="{{ route('hiragana_view') }}">Hiragana</a>
                        <a class="btn btn-outline-danger" href="">Katakana</a>
                        <a class="btn btn-outline-danger" href="">Kanji</a>
                        <a class="btn btn-outline-danger" href="">Hiragana & Katakana</a>
                        <a class="btn btn-outline-danger" href="">Vocabulary</a>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    @yield('controller')
                </div>
            </div>
        </div>
    </body>
</html>

