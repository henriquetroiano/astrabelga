@extends('layouts.site')

@section('titlepage', 'Documentos')

@section('metatag', 'Baixe nossos documentos de ajuda!')

@section('content')

@component('components.ads.horizontal')@endcomponent

<div class="container documentos-cliente">
    <div class="card">
        <h1 class="card-header">Documentos</h1>
        <div class="card-body">
            @if (count($documentos) > 0)
                @foreach ($documentos as $doc)
                    <div class="card my-3">
                        <h3 class="card-header">{{$doc->title}}</h3>
                        <div class="card-body">
                            <p>{{$doc->description}}</p>
                            <a href="{{$doc->file}}" class="btn btn-success">Baixar Arquivo</a>
                        </div>
                    </div>
                @endforeach
            @else
                <h5>Não há documentos cadastrados.</h5>
            @endif
        </div>
    </div>
</div>


    
@endsection
