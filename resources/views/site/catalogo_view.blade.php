@extends('layouts.site')

@section('titlepage', 'Catálogos')

@section('content')


    <div class="container catalogue-view pt-3 pb-5">

        @component('components.ads.horizontal')@endcomponent

		<div class="card">
            <div class="card-header"><h2 class="mb-n2">{{$peca->name}}<h2></div>
            <div class="card-body">
                <div class="fotos my-3">
                    <div class="splide" id="splide_catalogo">
                        <div class="splide__track">
                            <ul class="splide__list">
                                {{-- <li class="splide__slide">Slide 01</li>
                                <li class="splide__slide">Slide 02</li>
                                <li class="splide__slide">Slide 03</li> --}}
                                @foreach ($peca->photos as $photo)
                                    <li class="splide__slide">
                                        <a href="{{$photo->url}}" data-lightbox="image-1ss" data-title="{{$peca->description}}" class="foto" style='background-image: url("{{$photo->url}}")'></a> 
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <script>
                        new Splide( '#splide_catalogo', {
                            type   : 'loop',
                            perPage: 3,
                            breakpoints: {
                                1000: {
                                    perPage: 2,
                                },
                                700: {
                                    perPage: 1,
                                },
                            }
                        } ).mount();
                    </script>
                </div>
                <div class="marcas">
                    @foreach ($peca->marcas as $marca)
                        <div class="card mb-4 marca">
                            <div class="card-header">
                                Nome: <b>{{$marca->name}}</b> <br>
                                Código: <b>{{$marca->code}}</b> <br>
                                Observação: <b>{{$marca->description}}</b>
                            </div>
                            <div class="card-body">

                                <div class="splide" id="splide_marca{{$marca->id}}">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            {{-- <li class="splide__slide">Slide 01</li>
                                            <li class="splide__slide">Slide 02</li>
                                            <li class="splide__slide">Slide 03</li> --}}
                                            @foreach ($marca->photos as $photo)
                                                <li class="splide__slide">
                                                    <a href="{{$photo->url}}" data-lightbox="image-{{$marca->id}}{{$photo->id}}" data-title="{{$peca->description}}" class="foto-marca" style='background-image: url("{{$photo->url}}")'></a> 
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <script>
                                    new Splide( '#splide_marca{{$marca->id}}', {
                                        type   : 'loop',
                                        perPage: 3,
                                        breakpoints: {
                                            1000: {
                                                perPage: 2,
                                            },
                                            700: {
                                                perPage: 1,
                                            },
                                        }
                                    } ).mount();
                                </script>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>




        {{-- <div class="card">
            <div class="card-header">{{$peca->name}}</div>
            <div class="card-title">{{$peca->code}}</div>
            <div class="card-subtitle">{{$peca->description}}</div>
            <div class="card-body">
                <div class="fotos">
                    <div class="splide-catalogo">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($peca->photos as $photo)
                                    <li class="splide__slide">
                                        <a href="{{$photo->url}}" data-lightbox="image-1" data-title="{{$peca->description}}" class="foto" style='background-image: url("{{$photo->url}}")'></a> 
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        
        
    </div>
    
@endsection