<div class="container-slider">
    <h4>Últimas Notícias</h4>
    <div class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="item-slide" style="background-image: url('{{ asset("images/slider/astra.jpg") }}')">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="item-slide" style="background-image: url('{{ asset("images/slider/astra.jpg") }}')">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="item-slide" style="background-image: url('{{ asset("images/slider/astra.jpg") }}')">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="item-slide" style="background-image: url('{{ asset("images/slider/astra.jpg") }}')">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="item-slide" style="background-image: url('{{ asset("images/slider/astra.jpg") }}')">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="item-slide" style="background-image: url('{{ asset("images/slider/astra.jpg") }}')">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
	new Splide( '.splide', {
        autoplay: true,
        interval: 3500,
        pauseOnHover: true,
        lazyload: 'nearby',
        rewind : true,
    } ).mount();
</script>