@extends('layouts.site')

@section('titlepage', 'Página Inicial')

@section('content')


    <div class="container cards pt-3">

        @component('components.sliderhome')@endcomponent
        
        <div class="card mt-3 mb-3">
            <div class="card-header">
                Peças
            </div>
            <div class="card-body">
                <h5 class="card-title">Catálogo de Peças Compatíveis / Intercambiáveis</h5>
                <p class="card-text">Temos uma tabela em constante atualização com as peças originais de cada marca. Basta apenas copiar o código da peça e buscar no MercadoLivre ou afins.</p>
                <a href="#" class="btn btn-primary">Ver peças intercambiáveis</a>
            </div>
        </div>
        <div class="card mt-3 mb-3">
            <div class="card-header">
                Manutenção
            </div>
            <div class="card-body">
                <h5 class="card-title">Download de Arquivos</h5>
                <p class="card-text">Clique no botão abaixo para acessar nossos documentos gratuitos para reparação do seu Astra.</p>
                <a href="#" class="btn btn-primary">Ver documentos</a>
            </div>
        </div>
        <div class="card mt-3 mb-3">
            <div class="card-header">
                Comunidade
            </div>
            <div class="card-body">
                <h5 class="card-title">Grupo de Whatsapp</h5>
                <p class="card-text">Participe de nosso grupo no Whatsapp. Clicando no botão abaixo você entrará no grupo.</p>
                <a href="#" class="btn btn-primary">Entrar no grupo de Whatsapp</a>
            </div>
        </div>
    </div>
@endsection