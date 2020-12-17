<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light static-top" style="background-color: #e5e5e5">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="height: 50px" src="{{ asset('images/logo-c.png') }}" alt="">
                  </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  
                </ul>
                @if (Route::currentRouteName() != 'register')
                    <a class="btn btn-primary ml-3" href="{{ route('register') }}">Não é cadastrado? Criar conta</a>
                @elseif (Route::currentRouteName() == 'register')
                    <a class="btn btn-light ml-3" href="{{ url('/login') }}" >Possui uma conta? Fazer Login</a>
                @endif

                {{--  <form class="form-inline my-2 my-lg-0 pl-2">
                  <input class="form-control mr-sm-1" type="search" placeholder="Procurar no site" aria-label="Search">
                  <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
                </form>  --}}
              </div>
            </div>
          </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
