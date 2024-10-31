@extends('default.layout')
@section('content')
    <div class="inner-hero">
        <div class="container">
            <div class="rwo">
                <div class="col-lg-8 m-auto text-cetner">
                    <div class="main-heading">
                        <h1>{{$item->title}}</h1>
                        <div class="page-intro">
                            <a href="/">Strona główna</a>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                            <p>{{$item->title}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/shapes/inner-hero-shape1.png') }}" alt="" class="shape1">
        <img src="{{ asset('images/shapes/inner-hero-shape2.png') }}" alt="" class="shape2">
        <img src="{{ asset('images/shapes/inner-hero-shape3.png') }}" alt="" class="shape3">
    </div>
    <div class="service-details sp">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 sp-right30">
                    <article class="custom-blog_style">
                        <div class="details-info-box">
                            <div class="image">
                                <img src="{{ renderImage($item->galleryCover(), 1800, 400, 'cover') }}" alt="">
                            </div>
                            <div class="space30"></div>
                            <div class="heading1">
                                <h3>{{$item->title}}</h3>
                                <div class="space16"></div>
                                {!! $item->text !!}
                            </div>
                        </div>
                        <div class="gallery" style="padding-top: 40px">
                            <div class="row">
                                @foreach($item->gallery->items as $item)
                                    @if($item->type !== 'cover')
                                        <div class="col-lg-4">
                                            <a href="{{ renderImage($item->url, 1920, 1080, 'resize') }}">
                                                <img style="width: 100%" src="{{ renderImage($item->url, 600, 600, 'fit') }}" alt="">
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    @include('default.article.home2')
                </div>

            </div>
        </div>
    </div>
    @push('scripts.body.bottom')
        <script>
            var lightbox = $('.gallery a').simpleLightbox({});
        </script>
    @endpush
@endsection
