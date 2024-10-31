<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {!! SEOMeta::generate() !!}

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('image/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('image/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('image/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('image/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('image/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('image/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('image/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('image/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('image/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('image/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('image/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('image/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('image/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('image/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="{{asset('css/vendors/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="{{asset('css/main.css')}}?version=1" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.10.3/simple-lightbox.min.css" integrity="sha512-Ne9/ZPNVK3w3pBBX6xE86bNG295dJl4CHttrCp3WmxO+8NQ2Vn8FltNr6UsysA1vm7NE6hfCszbXe3D6FUNFsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('css/mobile-menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/main_1.css')}}">

    <!--=====JQUERY=======-->
    <script src="{{asset('js/jquery-3-7-1.min.js')}}"></script>

    <script>
        const BASE_URL = '{{url()->to('/')}}/';
        const CSRF_TOKEN = '{{csrf_token()}}';
        const SITE_LANG = '{{app()->getLocale()}}';
    </script>

    @stack('scrips.head.bottom')
</head>
<body class="body1">

<div class="paginacontainer">

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>

</div>

<!--=====progress END=======-->

<!--=====preloader start=======-->

<div id="preloader" class="preloader2">
    <div class="progress-circle-all">
        <div class="circle-inner">
            <img src="{{asset('images/preloader.svg')}}" alt="Łowisko Zgoda" class="fish">
        </div>
        <div class="circle-progress"></div>
    </div>
    <div class="text">Ładowanie......</div>
</div>
<div id="content" style="display: none;">
</div>
<!--=====preloader end=======-->

<!--=====HEADER START=======-->

<div class="header2-top d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="contact-area">
                <div class="single-contact">
                    <div class="icon">
                        <img src="{{asset('images/icons/header2-top-icon1.png')}}" alt="">
                    </div>
                    <div class="heading">
                        <a href="mailto:{{getConstField('email')}}">{{getConstField('email')}}</a>
                    </div>
                </div>

                <div class="single-contact">
                    <div class="icon">
                        <img src="{{asset('images/icons/header2-top-icon2.png')}}" alt="">
                    </div>
                    <div class="heading">
                        <a href="{{getConstField('google_map')}}">{{getConstField('company_address')}}, {{getConstField('company_post_code')}} {{getConstField('company_city')}}</a>
                    </div>
                </div>

                <div class="single-contact">
                    <div class="icon">
                        <img src="{{asset('images/icons/header2-top-icon4.png')}}" alt="">
                    </div>
                    <div class="heading">
                        <a href="tel:{{str_replace(' ', '', getConstField('phone'))}}">{{getConstField('phone')}} </a>
                    </div>
                </div>

                <div class="single-contact">
                    <div class="icon">
                        <img src="{{asset('images/icons/blog2-icon2.png')}}" alt="">
                    </div>
                    <div class="heading">
                        @auth
                            <!-- Wyświetl nazwę zalogowanego użytkownika i przycisk "Wyloguj się" -->
                            <span>Witaj, {{ Auth::user()->name }}!</span>
                            <form method="POST" action="{{ route('user.logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-link">Wyloguj się</button>
                            </form>
                        @else
                            <a href="{{ route('user.login') }}">Logowanie</a>/<a href="{{ route('user.register') }}">Rejestracja</a>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<header>
    <div class="header-area header-area2 header-area-all d-none d-lg-block" id="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-elements">
                        <div class="site-logo">
                            <a href="/">
                                <img src="{{asset('images/logo.png')}}" alt="">
                            </a>
                        </div>


                        <div class="main-menu-ex main-menu-ex1">
                            @include('default.nav_item.main', ['name' => 'main'])
                        </div>



                        <div class="header2-buttons">
                            <a class="theme-btn4" style="display: flex" href="{{getConstField('google_map')}}">Jak do nas dojechać <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--=====HEADER END=======-->

<!--=====Mobile header start=======-->
<div class="mobile-header mobile-header-main d-block d-lg-none ">
    <div class="container-fluid">
        <div class="col-12">
            <div class="mobile-header-elements">
                <div class="mobile-logo">
                    <a href="/"><img src="{{asset('images/logo.png')}}" alt=""></a>
                </div>
                <div class="mobile-nav-icon">
                    <i class="fa-duotone fa-bars-staggered"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-sidebar d-block d-lg-none">
    <div class="logo-m">
        <a href="/"><img src="{{asset('images/logo.png')}}" alt=""></a>
    </div>
    <div class="menu-close">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="mobile-nav">

        @include('default.nav_item.main', ['name' => 'main'])

        <div class="mobile-button">
            <a class="theme-btn1 btn btn--ripple ripple" href="{{getConstField('google_map')}}">Jak do nas dojechać <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="single-footer-items">
            <h3>Dane kontaktowe</h3>

            <div class="contact-box">
                <div class="pera">
                    <a href="tel:{{str_replace(' ', '', getConstField('phone'))}}">{{getConstField('phone')}}</a>
                </div>
            </div>

            <div class="contact-box">
                <div class="pera">
                    <a href="mailto:{{getConstField('email')}}">{{getConstField('email')}}</a>
                </div>
            </div>

            <div class="contact-box">
                <div class="pera">
                    <a href="{{getConstField('google_map')}}">{{getConstField('company_address')}}, {{getConstField('company_post_code')}} {{getConstField('company_city')}}</a>
                </div>
            </div>
            <div class="contact-box">
                <div class="pera">
                    @auth
                        <!-- Wyświetl nazwę zalogowanego użytkownika i przycisk "Wyloguj się" -->
                        <span>Witaj, {{ Auth::user()->name }}!</span>
                        <form method="POST" action="{{ route('user.logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link">Wyloguj się</button>
                        </form>
                    @else
                        <a href="{{ route('user.login') }}">Logowanie</a>/<a href="{{ route('user.register') }}">Rejestracja</a>
                    @endauth
                </div>
            </div>

        </div>

        <div class="contact-infos">
            <h3>Media społecznościowe</h3>
            <ul class="social-icon">
                <li><a target="_blank" href="{{getConstField('facebook')}}"><i class="fa-brands fa-facebook-f"></i></a></li>
            </ul>
        </div>

    </div>
</div>

<!--=====Mobile header end=======-->
{{--@include('default._helpers.lang_nav')--}}
@yield('content')
<!--===== FOOTER AREA START =======-->

<div class="footer2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-logo-area">
                    <a href="/"><img src="{{asset('images/logo.png')}}" alt=""></a>
                    <div class="heading1">
                        {!! getConstField('company_description') !!}
                    </div>
                    <div class="social-icons">
                        <ul>
                            <li><a target="_blank" href="{{getConstField('facebook')}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg col-6">
                <div class="footer-list list">
                    <h5>Dane kontaktowe</h5>
                    <ul>
                        <li><a href="{{getConstField('google_map')}}">{{getConstField('company_address')}}, {{getConstField('company_post_code')}} {{getConstField('company_city')}}</a></li>
                        <li><a href="tel:{{str_replace(' ', '', getConstField('phone'))}}">{{getConstField('phone')}}</a></li>
                        <li><a href="tel:{{str_replace(' ', '', getConstField('phone2'))}}">{{getConstField('phone2')}}</a></li>
                        <li><a href="mailto:{{getConstField('email')}}">{{getConstField('email')}}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg col-6">
                <div class="footer-list list">
                    <h5>Przydatne linki</h5>
                    <ul>
                        <li>@auth
                                <!-- Wyświetl nazwę zalogowanego użytkownika i przycisk "Wyloguj się" -->
                                <span>Witaj, {{ Auth::user()->name }}!</span>
                                <form method="POST" action="{{ route('user.logout') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-link">Wyloguj się</button>
                                </form>
                            @else
                                <a href="{{ route('user.login') }}">Logowanie</a>/<a href="{{ route('user.register') }}">Rejestracja</a>
                            @endauth</li>
                        <li><a href="/regulamin">Regulamin</a></li>
                        <li><a href="https://rezerwacja.lowiskozgoda.pl/">Rezerwacja</a></li>
                        <li><a href="#">Cennik</a></li>
                        <li><a href="{{route('contact.show')}}">Kontakt</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="space50"></div>
        <div class="footer-border"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright-area">
                    <p style="text-align: center"><?php echo date("Y") ?> &copy; Wszelkie prawa zastrzeżone. Strona stworzona przez: <a href="https://palmax.pl">Palmax</a></p>
                </div>
            </div>
        </div>
    </div>

</div>

<!--===== FOOTER AREA END =======-->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.10.3/simple-lightbox.jquery.min.js" integrity="sha512-iJCzEG+s9LeaFYGzCbDInUbnF03KbE1QV1LM983AW5EHLxrWQTQaZvQfAQgLFgfgoyozb1fhzhe/0jjyZPYbmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('js/frontend.js')}}"></script>
<script src="{{asset('js/main.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/fontawesome.js')}}"></script>
<script src="{{asset('js/mobile-menu.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.countup.js')}}"></script>
<script src="{{asset('js/slick-slider.js')}}"></script>
<script src="{{asset('js/circle-progress.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.js')}}"></script>
<script src="{{asset('js/gsap.min.js')}}"></script>
<script src="{{asset('js/ScrollTrigger.min.js')}}"></script>
<script src="{{asset('js/swiper-bundle.js')}}"></script>
<script src="{{asset('js/Splitetext.js')}}"></script>
<script src="{{asset('js/text-animation.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/jaquery-ripples.js')}}"></script>
<script src="{{asset('js/jquery.lineProgressbar.js')}}"></script>
<script src="{{asset('js/animation.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@stack('scripts.body.bottom')
</body>
</html>
