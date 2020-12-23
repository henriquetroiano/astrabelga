@extends('layouts.site')

@section('titlepage', 'Administrador')

@section('content')


      <div class="container admin pt-3">

            @component('components.admin.left_nav')@endcomponent
            <div class="content">
                  <h2>Bem-vindo à página de Administrador.</h2>
                  <h4>Utilze o Menu admin para alterar os itens do site.</h4>
                  <h4>Faça as alterações com responsabilidade.</h4>
            </div>


        
    </div>
@endsection