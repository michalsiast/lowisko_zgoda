<div class="tp-slider-area">
    <div class="tp-slider-wrapper p-relative">
        @if($rotator->arrows)
            <div class="tp-slider-arrow-box">
                <button class="slider-prev"><i class="fa-regular fa-arrow-left"></i></button>
                <button class="slider-next"><i class="fa-regular fa-arrow-right"></i></button>
            </div>
        @endif
        <div class="swiper-container tp-slider-active">
            <div class="swiper-wrapper">
                @foreach($rotator->gallery->items as $item)
                    <div class="swiper-slide">
                        <div class="tp-slider-bg d-flex justify-content-center align-items-center p-relative fix">
                            <div class="tp-slider-img" style="background-image: url('{{renderImage($item->url, 1920, 700, `fit`)}}');"></div>
                            <div class="tp-slider-shape-1 z-index-1">
                            </div>
                            <div class="tp-slider-shape-2 z-index-2">
                                <img src="{{asset('images/shapes/hero2-shape2.png')}}" alt="">
                            </div>
                            <div class="tp-slider-shape-3 z-index-1">
                                <img src="{{asset('images/shapes/hero2-shape3.png')}}" alt="">
                            </div>
                            <div class="tp-slider-shape-4 z-index-1">
                                <img src="{{asset('images/shapes/hero2-shape4.png')}}" alt="">
                            </div>
                            <div class="container _relative">

                                <div class="shape1 animate3">
                                    <img src="{{asset('images/shapes/hero2-element1.png')}}" alt="">
                                </div>
                                <div class="shape2 animate4">
                                    <img src="{{asset('images/shapes/hero2-element2.png')}}" alt="">
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tp-slider-content-wrap p-relative z-index-2">
                                            <div class="tp-slider-title-box p-relative">
                                                <h1>{{$item->name}}</h1>
                                                <div class="space16"></div>
                                                {!! $item->text !!}
                                            </div>
                                            <div class="space30"></div>
                                            <div class="tp-slider-video-box d-flex align-items-center">
                                                <div class="tp-slider-btn">
                                                    <a class="theme-btn4" href="{{route('gallery.show')}}">Strefa klienta <span class="arrow"><i class="fa-solid fa-angle-right"></i></span></a>
                                                    <a class="theme-btn5" href="{{route('offer.index')}}">Cennik <span class="arrow"><i class="fa-solid fa-angle-right"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts.body.bottom')
    <script>
        var slider = new Swiper('.tp-slider-active', {
            speed: {{$rotator->speed ?? 500}},
            slidesPerView: 1,
            autoplay: {
                delay: {{$rotator->time ?? 3000}},
                disableOnInteraction: false,
            },
            loop: true,
            effect:'fade',
            breakpoints: {
                '1400': {
                    slidesPerView: 1,
                },
                '1200': {
                    slidesPerView: 1,
                },
                '992': {
                    slidesPerView: 1,
                },
                '768': {
                    slidesPerView: 1,
                },
                '576': {
                    slidesPerView: 1,
                },
                '0': {
                    slidesPerView: 1,
                },
            },
            a11y: false,
            // Navigation arrows
            navigation: {
                prevEl: '.slider-prev',
                nextEl: '.slider-next',
            },

        });
    </script>
@endpush
