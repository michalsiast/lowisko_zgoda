<div class="row">
    @foreach($items as $index => $item)
        @php
            $totalItems = count($items);
            $colClass = 'col-lg-4';
            if ($totalItems % 3 == 2 && $index >= $totalItems - 2) {
                $colClass = 'col-lg-6';
            } elseif ($totalItems % 3 == 1 && $index >= $totalItems - 1) {
                $colClass = 'col-lg-12';
            }
        @endphp

        <div class="{{ $colClass }} col-md-6" data-aos="zoom-in-up" data-aos-duration="800">
            <div class="service2-box">
                <div class="icon">
                    <img style="width: 32px" src="{{ renderImage($item->galleryCover(), 32, 32, 'cover') }}" alt="">
                </div>
                <div class="heading2">
                    <h4>{{ $item->title }}</h4>
                    <div class="space16"></div>
                    {!! $item->text !!}
                </div>
            </div>
        </div>
    @endforeach
</div>
