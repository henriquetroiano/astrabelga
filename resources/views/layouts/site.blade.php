<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  metadata  --}}
    <!-- Primary Meta Tags -->
<title>@yield('titlepage') | Tudo sobre o Astra Belga - Manutenção, Manuais, Tutoriais </title>
<meta name="title" content="Tudo sobre o Astra Belga - Manutenção, Manuais, Tutoriais ">
<meta name="description" content="Conheça a maior comunidade do Astra Belga no Brasil. Aqui você encontra tutoriais para manutenção do seu carro, dicas de peças, baixa gratuitamente os manuais. Participe também de nosso grupo no Whatsapp!">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="http://astrabelga.site/">
<meta property="og:title" content="Tudo sobre o Astra Belga - Manutenção, Manuais, Tutoriais ">
<meta property="og:description" content="Conheça a maior comunidade do Astra Belga no Brasil. Aqui você encontra tutoriais para manutenção do seu carro, dicas de peças, baixa gratuitamente os manuais. Participe também de nosso grupo no Whatsapp!">
<meta property="og:image" content="">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="http://astrabelga.site/">
<meta property="twitter:title" content="Tudo sobre o Astra Belga - Manutenção, Manuais, Tutoriais ">
<meta property="twitter:description" content="Conheça a maior comunidade do Astra Belga no Brasil. Aqui você encontra tutoriais para manutenção do seu carro, dicas de peças, baixa gratuitamente os manuais. Participe também de nosso grupo no Whatsapp!">
<meta property="twitter:image" content="">

{{--  end metatags section  --}}

{{--  favicon sections  --}}
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicons/apple-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicons/apple-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicons/apple-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicons/apple-icon-76x76.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicons/apple-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicons/apple-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicons/apple-icon-144x144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicons/apple-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-icon-180x180.png')}}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicons/android-icon-192x192.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicons/favicon-96x96.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/favicon-16x16.png')}}">
<link rel="manifest" href="{{ asset('images/favicons/manifest.json')}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
{{--  end favicon sections  --}}


{{--  adsense codes  --}}
<script data-ad-client="ca-pub-7507067185939443" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
{{--  end adsense codes  --}}

{{--  integrated bootstrap files  --}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>

{{--  personal files  --}}
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<script src="{{ asset('js/scripts.js') }}"></script>

{{-- slider files --}}
<script src="{{ asset('js/splidejs/splide.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/splidejs/splide.min.css') }}">

{{--  font awesome styles  --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css"
        integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">


{{-- lightbox css --}}
<link rel="stylesheet" href="{{ asset('/plugins/lightbox/css/lightbox.min.css') }}">
        
</head>

<body>
    
    @component('components.header')@endcomponent

    @yield('content')

    @component('components.footer')@endcomponent

    
    <script src="{{ asset('/plugins/lightbox/js/lightbox.min.js') }}"></script>
</body>
</html>