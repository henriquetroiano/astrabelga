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
        <li class="nav-item @if(Route::currentRouteName() == 'home') active @endif" >
          <a class="nav-link" href="{{ url('/') }}">Página Inicial</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName() == 'catalogos' or Route::currentRouteName() == 'catalogos_view') active @endif">
          <a class="nav-link" href="{{ url('/catalogos') }}">Catálogos de Peças</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName() == 'documentos') active @endif">
          <a class="nav-link" href="{{ url('/documentos') }}">Documentos</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName() == 'videos') active @endif">
          <a class="nav-link" href="{{ url('/videos') }}">Vídeos</a>
        </li>
        {{-- <li class="nav-item dropdown @if(Route::currentRouteName() == 'esquemas' || Route::currentRouteName() == 'manuais') active @endif">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Manutenção
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/documentos') }}">Documentos e Manuais</a>
            <a class="dropdown-item" href="{{ url('/videos') }}">Vídeos</a>
          </div>
        </li> --}}
        {{-- <li class="nav-item @if(Route::currentRouteName() == 'fichas-tecnicas') active @endif">
          <a class="nav-link" href="{{ url('/fichas-tecnicas') }}">Fichas Técnicas</a>
        </li> --}}
        <li class="nav-item @if(Route::currentRouteName() == 'sobre') active @endif">
          <a class="nav-link" href="{{ url('/quem-somos') }}">Quem Somos</a>
        </li>
      </ul>
        @if (Auth::user() )
            <div class="dropdown mr-n5 ml-3 btn-login">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    {{ strtok(Auth::user()->name, ' ') }}
                </button>
                <div class="dropdown-menu ml-n3" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('/account') }}">Minha Conta</a>
                    @if (Auth::user()->level == '1')
                        <a class="dropdown-item" href="{{ url('/admin') }}">Painel do Admin</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        @else
            <div class="dropdown mr-n5 ml-3">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
            </button>
            <div class="dropdown-menu ml-n3" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
                <a class="dropdown-item" href="{{ url('/register') }}">Criar conta</a>
            </div>
        </div>
        @endif
      {{--  <form class="form-inline my-2 my-lg-0 pl-2">
        <input class="form-control mr-sm-1" type="search" placeholder="Procurar no site" aria-label="Search">
        <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
      </form>  --}}
    </div>
  </div>
  


</nav>

