@extends('layouts.site')

@section('titlepage', 'Documentos')

@section('metatag', 'Assista nossos vídeos e faça você mesmo!')

@section('content')

@component('components.ads.horizontal')@endcomponent

<div class="container videos-cliente">
    <div class="card">
        <h1 class="card-header">Vídeos</h1>
        <div class="card-body">
            @if (count($videos) > 0)
                @foreach ($videos as $video)
                    <div class="card my-3">
                        <h3 class="card-header">
                            {{$video->title}}
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse_video_id_{{$video->id}}" aria-expanded="false" aria-controls="collapse_video_id_{{$video->id}}">
                                Ver Vídeo +
                              </button>
                        </h3>
                        <div class="card-body collapse" id="collapse_video_id_{{$video->id}}">
                            {!! $video->iframe !!}
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
