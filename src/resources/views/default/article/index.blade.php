@extends('default.layout')
@section('content')
    @include('default.subheader', ['pageName' => $page])
    <div class="blog-page-all sp">
        <div class="container">
            <div class="row">
                @foreach($items as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-box">
                            <div class="image">
                                <img style="width:100%; height:380px;object-fit:cover;" src="{{ renderImage($item->galleryCover(), 555, 560, 'cover') }}" alt="">
                            </div>
                            <div class="heading1">
                                <h5><a href="{{route('article.show.'.$item->id)}}">{{$item->title}} </a></h5>
                                <div class="space16"></div>
                                {!! $item->lead !!}
                                <div class="space16"></div>
                                <a href="{{route('article.show.'.$item->id)}}" class="learn">Zobacz więcej <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection





