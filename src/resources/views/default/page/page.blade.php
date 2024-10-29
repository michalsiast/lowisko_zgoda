@extends('default.layout')
@section('content')

    @include('default.subheader', ['pageName' => $page])
    <div class="about-page-sec sp list_style_custom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="heading2">
                        {!! $fields->text1 !!}
                    </div>
                </div>
            </div>
            @foreach($gallery->items as $galleryItem)
                <img src="{{renderImage($galleryItem->url, 400, 200, 'resize')}}" alt="{{$galleryItem->name ?? ''}}">
            @endforeach
        </div>
    </div>
@endsection
