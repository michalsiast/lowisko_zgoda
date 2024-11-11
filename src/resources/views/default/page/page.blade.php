@extends('default.layout')
@section('content')

    @include('default.subheader', ['pageName' => $page])
    @if(!empty($fields->text1))
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
    @endif
    <div class="gallery sp">
        <div class="container">
            <div class="row">
                @foreach($page->gallery->items as $item)
                    <div class="col-lg-4" style="margin-top: 15px">
                        <a href="{{renderImage($item->url, 1920, 1080, 'resize')}}">
                            <img style="width: 100%;" src="{{renderImage($item->url, 600, 600, 'fit')}}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @push('scripts.body.bottom')
        <script>
            var lightbox = $('.gallery a').simpleLightbox({});
        </script>
    @endpush
@endsection
