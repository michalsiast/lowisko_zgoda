@extends('default.layout')
@section('content')
{{--{!! getPhoneLink('phone', 'phone', '<b>icon</b> ') !!}--}}
{{--{!! getEmailLink('email', 'email',  '<b>icon</b> ') !!}--}}
{{--    <span style="display: block">{!! getAddressString() !!}</span>--}}
{{--    <span style="display: block">{!! getFooterCreator() !!}</span>--}}

    @include('default.rotator.base', ['id_rotator' => $fields->rotator, 'type' => 'main'])
<div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0">
    <div class="about2 sp" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about2-images">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="image image-anime reveal">
                                    <img style="width: 100%; height: 605px;object-fit: cover; border-radius: 12px" src="{{ asset('images/about_us_1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="image-2 image-anime reveal">
                                    <img style="width: 100%; height: 530px;object-fit: cover; border-radius: 12px" src="{{ asset('images/about_us_2.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="heading2">
                        @if(!empty($fields->subheader_about_us))
                            <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                            <img src="{{ asset('images/icons/span2.png') }}" alt="">
                            {{ $fields->subheader_about_us }}
                        </span>
                        @endif

                        @if(!empty($fields->header_about_us))
                            <h2 class="text-anime-style-3">{{ $fields->header_about_us }}</h2>
                        @endif

                        <div class="space16"></div>

                        @if(!empty($fields->description_about_us))
                            <p data-aos="fade-left" data-aos-duration="800">{!! $fields->description_about_us !!}</p>
                        @endif

                        <div class="space30"></div>

                        <div class="" data-aos="fade-left" data-aos-duration="1200">
                            <a class="theme-btn4" href="/">Cennik <span class="arrow"><i class="fa-solid fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="service2 sp" id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="heading2">
                        @if(!empty($fields->subtitle_why_us))
                            <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                    <img src="{{ asset('images/icons/span2.png') }}" alt="">
                    {{$fields->subtitle_why_us}}
                </span>
                        @endif

                        @if(!empty($fields->header_why_us))
                            <h2 class="text-anime-style-3">{{$fields->header_why_us}}</h2>
                        @endif

                        <div class="space16"></div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <div class="heading2">
                        @if(!empty($fields->description_why_us))
                            <p data-aos="fade-left" data-aos-duration="800">{!! $fields->description_why_us !!}</p>
                        @endif

                        <div class="space30"></div>
                        <div class="" data-aos="fade-left" data-aos-duration="1000">
                            <a class="theme-btn4" href="service.html">Zobacz galerię
                                <span class="arrow"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="space30"></div>


        </div>
        <img class="shape1" src="{{ asset('images/shapes/service2-shape1.png') }}" alt="">
        <img class="shape2" src="{{ asset('images/shapes/service2-shape2.png') }}" alt="">
        <img class="shape3" src="{{ asset('images/shapes/service2-shape2.png') }}" alt="">
        <img class="shape4" src="{{ asset('images/shapes/service2-shape3.png') }}" alt="">
    </div>
    <div class="project2 sp" id="project">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="heading2-w">
                        @if(!empty($fields->subtitle_about_fishery))
                            <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                    <img src="{{ asset('images/icons/span2.png') }}" alt="Podtytuł">
                    {{$fields->subtitle_about_fishery}}
                </span>
                        @endif

                        @if(!empty($fields->header_about_fishery))
                            <h2 class="text-anime-style-3">{{$fields->header_about_fishery}}</h2>
                        @endif
                    </div>
                </div>

                <div class="col-lg-2"></div>

                <div class="col-lg-5">
                    <div class="heading2-w">
                        @if(!empty($fields->short_description_about_fishery))
                            <p data-aos="fade-left" data-aos-duration="800">{!! $fields->short_description_about_fishery !!}</p>
                        @endif
                        <div class="space30"></div>
                        <div class="" data-aos="fade-left" data-aos-duration="1000">
                            <a class="theme-btn4" href="about.html">Strefa użytkownika
                                <span class="arrow"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space30"></div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="tabs-buttons">
                        <div class="d-flex align-items-start" style="color: #fff">
                            @if(!empty($fields->long_description_about_fishery))
                                {!! $fields->long_description_about_fishery !!}
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="tabs-contact">
                        <div class="image image-anime">
                            <img style="border-radius: 12px" src="{{ asset('images/about_fishery_1.jpg') }}" alt="O łowisku">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/shapes/project2-shape.png') }}" alt="" class="shape animate2">
        <img src="{{ asset('images/shapes/project2-shape2.png') }}" alt="" class="shape2 animate1">
    </div>
    <div class="blog2 sp" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto text-center">
                    <div class="heading2">
                        <span class="span" data-aos="zoom-in-left" data-aos-duration="700">
                            <img src="{{ asset('images/icons/span2.png') }}" alt="">
                            @if(!empty($fields->subtitle_news))
                                {{$fields->subtitle_news}}
                            @endif
                        </span>
                        @if(!empty($fields->title_news))
                            <h2 class="text-anime-style-3">{{$fields->title_news}}</h2>
                        @endif
                        <div class="space16"></div>
                        @if(!empty($fields->description_news))
                            <p data-aos="fade-left" data-aos-duration="800">{!! $fields->description_news !!}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="space30"></div>
            @include('default.article.home')
        </div>
    </div>
</div>
@endsection
