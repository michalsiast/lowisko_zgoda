<div class="details-sidebar">
    <div class="sidebar-box mb40">
        <h3>Inne aktualności</h3>
        <div class="space10"></div>
        @foreach($items as $item)
            <div class="recent-box">
                <div class="">
                    <div class="image">
                        <img src="{{ renderImage($item->galleryCover(), 100, 100, 'cover') }}" alt="">
                    </div>
                </div>
                <div class="heading">
                    <h5><a href="{{route('article.show.'.$item->id)}}">{{$item->title}}</a></h5>
                    {!! $item->lead !!}
                </div>
            </div>
        @endforeach
    </div>
    <div class="sidebar-box mb40">
        <ul class="service-list">
            <li><a href="{{getConstField('google_map')}}">Jak do nas dojechać <span><i class="fa-solid fa-arrow-right"></i></span></a></li>
        </ul>
    </div>

    <div class="phone-area mb40">
        <p>Masz pytania? Zadzwoń do nas</p>
        <a href="tel:{{str_replace(' ', '', getConstField('phone'))}}" class="phone-btn"><img src="{{asset('images/icons/phone.svg')}}" alt=""> {{getConstField('phone')}}</a>
    </div>

</div>
