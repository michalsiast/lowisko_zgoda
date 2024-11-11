<div class="container position-relative" style="padding-top: 50px">
    <div class="owl-carousel owl-theme banner-carousel">
        @foreach($items as $item)
            <div class="item">
                <a target="_blank" href="{{$item->title}}">
                    <img style="max-height: 150px; object-fit: contain" src="{{ renderImage($item->galleryCover(), 1800, 150, 'cover') }}" />
                </a>
            </div>
        @endforeach
    </div>
    <div class="custom-nav position-absolute">
        <button class="custom-prev"><i class="fa-solid fa-angle-left"></i></button>
        <button class="custom-next"><i class="fa-solid fa-angle-right"></i></button>
    </div>
</div>

@push('scripts.body.bottom')
    <script>
        var owl = $('.banner-carousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: false, // Disable built-in nav
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                980: {
                    items: 5,
                }
            }
        });

        // Custom navigation
        $('.custom-prev').click(function() {
            owl.trigger('prev.owl.carousel');
        });

        $('.custom-next').click(function() {
            owl.trigger('next.owl.carousel');
        });
    </script>
@endpush
