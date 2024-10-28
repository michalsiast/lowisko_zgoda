@extends('default.layout')
@section('content')
    @include('default.subheader', ['pageName' => $page])
    <div class="about-page-sec sp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="image1">
                        <img src="{{ asset('images/about_us_3.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="heading2">
                        @if(!empty($fields->subheader_about_us))
                            <span class="span"><img src="{{ asset('images/icons/span2.png') }}" alt=""> {{$fields->subheader_about_us}}</span>
                        @endif

                        @if(!empty($fields->header_about_us))
                            <h2>{{$fields->header_about_us}}</h2>
                        @endif

                        <div class="space16"></div>

                        @if(!empty($fields->description_about_us))
                            {!! $fields->description_about_us !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
