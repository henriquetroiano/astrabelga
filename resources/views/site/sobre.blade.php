@extends('layouts.site')

@section('titlepage', 'Quem Somos')

@section('content')

@component('components.ads.horizontal')@endcomponent

<div class="content-sobre container">
    <h2 class="text-center">Quem Somos</h2>
    <br>
    <p class="text-justify text-last-center">Somos uma equipe de mais de 150 donos de Astras espalhados ao redor do Brasil inteiro. Movidos pela disposição e vontade de ajurdar-nos uns aos outros, criamos esta plataforma com o intuito de facilitarmos o acesso à manutenção de nosso carro. <br> Também somos uma grande equipe que, sempre dentro do possível estamos disponíveis para ajudar a todos que tenham problemas com seus carros.</p>
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="mb-0 text-center">Já faz parte da nossa comunidade no whatsapp?</h3>
        </div>
        <div class="card-body text-center">
            <p class="mb-0">Clique no botão abaixo e faça parte do nosso grupo no whatsapp, estaremos felizes em lhe ajudar.</p>
            <br>
            <a href="https://chat.whatsapp.com/LwfIsErIfhCIScAQplhMMU" target="_blank" class="btn btn-success">Entrar no Grupo</a>
        </div>
    </div>
    <div class="card mt-3 mb-5">
        <div class="card-header">
            <h3 class="mb-0 text-center">Inscreva-se no nosso canal do Youtube!</h3>
        </div>
        <div class="card-body text-center">
            <p class="mb-0">Clique no botão abaixo e faça sua inscrição no nosso canal do Youtube. Lá, você encontrará dicas de manutenção corretiva e preventiva, dicas, macetes e várias outras informações sobre o Astra Belga e outros carros GM com as mesmas características.</p>
            <br>
            <a href="https://www.youtube.com/channel/UCfYcqNSFQ9s9vZBxSlLS3Uw" target="_blank" class="btn btn-danger">Inscrever-se no Canal do Youtube</a>
        </div>
    </div>
</div>


    
@endsection
