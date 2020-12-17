<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light static-top" style="background-color: #e5e5e5">
  <div class="container">
    <a class="navbar-brand" href="#">
          <img style="height: 50px" src="{{ asset('images/logo-c.png') }}" alt="">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Página Inicial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Catálogos de Peças</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Manutenção
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Esquemas Elétricos</a>
              <a class="dropdown-item" href="#">Manuais de Manutenção</a>
            </div>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre Nós</a>
        </li>
      </ul>
        @if (Auth::user()->name)
            <div class="dropdown mr-n5 ml-3">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu ml-n3" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Minha Conta</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ url('/logout') }}">Sair</a>
                </div>
            </div>
        @else
            <a href="{{ url('/login') }}" Login</a>
        @endif
      {{--  <form class="form-inline my-2 my-lg-0 pl-2">
        <input class="form-control mr-sm-1" type="search" placeholder="Procurar no site" aria-label="Search">
        <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
      </form>  --}}
    </div>
  </div>
  


</nav>

