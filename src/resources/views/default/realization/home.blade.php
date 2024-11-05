<div class="container" style="padding-top: 50px">
    <div class="owl-carousel owl-theme banner-carousel">
        @foreach($items as $item)
            <div class="item">
                <a target="_blank" href="{{$item->title}}"><img style="max-height: 150px; object-fit: contain" src="{{ renderImage($item->galleryCover(), 1800, 150, 'cover') }}" /></a>
            </div>
        @endforeach
    </div>
</div>

@push('scripts.body.bottom')
    <script>
        $('.banner-carousel').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            nav:false,
            dots: false,
            responsive:{
                0:{
                    items:1
                },
            }
        })
    </script>
@endpush
