@extends('layouts.site')

@section('titlepage', 'Documentos')

@section('content')

@component('components.ads.horizontal')@endcomponent

<div class="container videos-cliente">
    <div class="card">
        <h1 class="card-header">Vídeos</h1>
        <div class="card-body">
            @if (count($videos) > 0)
                @foreach ($videos as $video)
                    <div class="card my-3">
                        <h3 class="card-header">{{$video->title}}</h3>
                        <div class="card-body">
                            <iframe width="560" height="315" src="{{$video->url}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
            @else
                <h5>Não há videos cadastrados.</h5>
            @endif
        </div>
    </div>
</div>


    
@endsection
