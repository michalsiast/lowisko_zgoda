<div class="row">
    @foreach($items as $item)
        <div class="col-lg-4 col-md-6">
            <div class="blog2-box" data-aos="zoom-in-up" data-aos-duration="800">
                <div class="image image-anime">
                    <img style="width:100%; height:380px;object-fit:cover;" src="{{ renderImage($item->galleryCover(), 555, 560, 'cover') }}" alt="">
                </div>
                <div class="heading2">
                    <h4><a href="{{route('article.show.'.$item->id)}}">{{$item->title}}</a></h4>
                    {!! $item->lead !!}
                    <div class="space16"></div>
                    <a href="{{route('article.show.'.$item->id)}}" class="learn">Zobacz więcej <span class="arrow"><i class="fa-solid fa-angle-right"></i></span></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
