@extends('default.layout')
@section('content')
    <div class="inner-hero">
        <div class="container">
            <div class="rwo">
                <div class="col-lg-8 m-auto text-cetner">
                    <div class="main-heading">
                        <h1>{{$page->name}}</h1>
                        <div class="page-intro">
                            <a href="/">Strona główna</a>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                            <p>{{$page->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/shapes/inner-hero-shape1.png') }}" alt="" class="shape1">
        <img src="{{ asset('images/shapes/inner-hero-shape2.png') }}" alt="" class="shape2">
        <img src="{{ asset('images/shapes/inner-hero-shape3.png') }}" alt="" class="shape3">
    </div>
    <div class="about-page-sec sp list_style_custom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="heading2">
                        {!! $fields->text1 !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
