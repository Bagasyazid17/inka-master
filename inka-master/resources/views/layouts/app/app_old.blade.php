<!DOCTYPE html>
<html>
<head>
    <!-- Site made with Mobirise Website Builder v4.4.1, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.4.1, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('/')}}/images/favicon.png" rel="icon" type="image/x-icon" />
    <meta name="description" content="">
    @yield('title')
    <link rel="stylesheet" href="{{url('/')}}/app/assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/tether/tether.min.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/bootstrap/css/bootstrap-grid.min.css">
    <!-- <link rel="stylesheet" href="{{url('/')}}/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{url('/')}}/app/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/socicon/css/styles.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/theme/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/mobirise-gallery/style.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/css/inka.css">
    @stack('stylesheets')

    @stack('headScripts')
</head>
<body>
    <section class="top-nav right">
        <div class="container">
            <div class="top-menu">
                @if(Session::get('lang') == 'en')
                    <a href="{{ route('app.lang', ['id' => 'id']) }}" class="lang-flag">
                        <img src="{{url('/')}}/icon/id.png">
                    </a>
                @else
                    <a href="{{ route('app.lang', ['id' => 'en']) }}" class="lang-flag">
                        <img src="{{url('/')}}/icon/en.png">
                    </a>
                @endif
            </div>
        </div>
    </section>

    <section class="menu cid-qDtkfTUzsR" once="menu" id="menu1-z" data-rv-view="1560">
        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm nav-offset">
            <div class="container">

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="menu-logo">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="{{url('/')}}">
                                 <img src="{{url('/')}}/assets/logo/logo-sm.png" alt="Inka" media-simple="true" style="height: 1.5rem;">
                            </a>
                        </span>
                        <!-- <span class="navbar-caption-wrap">
                            <a class="navbar-caption text-white display-4" href="{{url('/')}}">
                                INKA
                            </a>
                        </span> -->
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ route('app.index') }}">
                                @if(Session::get('lang') == 'id')
                                    Beranda
                                @elseif(Session::get('lang') == 'en')
                                    Home
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown open">
                            <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                @if(Session::get('lang') == 'id')
                                    Korporasi
                                @elseif(Session::get('lang') == 'en')
                                    Corporation
                                @endif<br>
                            </a>
                            <div class="dropdown-menu">
                                @foreach(Session::get('corporation') as $item)
                                    <a class="text-white dropdown-item display-4" href="{{ route('app.corporation.show', ['id' => $item->id]) }}">{{$item->nama}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown open">
                            <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                @if(Session::get('lang') == 'id')
                                    Produk
                                @elseif(Session::get('lang') == 'en')
                                    Product
                                @endif<br>
                            </a>
                            <div class="dropdown-menu">
                                @foreach(Session::get('masterProduct') as $item)
                                    <a class="text-white dropdown-item display-4" href="{{ route('app.product.index', ['id' => $item->id]) }}">{{$item->nama}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown open">
                            <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                @if(Session::get('lang') == 'id')
                                    Galeri
                                @elseif(Session::get('lang') == 'en')
                                    Galery
                                @endif<br>
                            </a>
                            <div class="dropdown-menu">
                                @foreach(Session::get('galeri') as $item)
                                    <a class="text-white dropdown-item display-4" href="{{ route('app.galeri.show', ['id' => $item->id]) }}">{{$item->nama}}</a>
                                @endforeach
                            </div>
                        </li>
                        @if(Session::get('lang') == 'id')
                        <li class="nav-item dropdown open">
                            <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                Pengadaan<br>
                            </a>
                            <div class="dropdown-menu">
                                @foreach(Session::get('masterProcurement') as $item)
                                    <a class="text-white dropdown-item display-4" href="{{ route('app.procurement.show', ['id' => $item->id]) }}">{{$item->nama}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ route('app.berita.index') }}">
                                Berita
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ route('app.karir.index') }}">
                                Karir
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ route('app.contact.index') }}">
                                @if(Session::get('lang') == 'id')
                                    Kontak
                                @elseif(Session::get('lang') == 'en')
                                    Contact Us
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </section>

    @yield('content')

    <script src="{{url('/')}}/app/assets/web/assets/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/app/assets/popper/popper.min.js"></script>
    <script src="{{url('/')}}/app/assets/tether/tether.min.js"></script>
    <script src="{{url('/')}}/app/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/app/assets/smooth-scroll/smooth-scroll.js"></script>
    <script src="{{url('/')}}/app/assets/dropdown/js/script.min.js"></script>
    <script src="{{url('/')}}/app/assets/touch-swipe/jquery.touch-swipe.min.js"></script>
    <script src="{{url('/')}}/app/assets/jquery-mb-ytplayer/jquery.mb.ytplayer.min.js"></script>
    <script src="{{url('/')}}/app/assets/social-likes/social-likes.js"></script>
    <script src="{{url('/')}}/app/assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
    <script src="{{url('/')}}/app/assets/masonry/masonry.pkgd.min.js"></script>
    <script src="{{url('/')}}/app/assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{url('/')}}/app/assets/jarallax/jarallax.min.js"></script>
    <script src="{{url('/')}}/app/assets/jquery-mb-vimeo_player/jquery.mb.vimeo_player.js"></script>
    <script src="{{url('/')}}/app/assets/theme/js/script.js"></script>
    <script src="{{url('/')}}/app/assets/mobirise-gallery/player.min.js"></script>
    <script src="{{url('/')}}/app/assets/mobirise-gallery/script.js"></script>
    <script src="{{url('/')}}/app/assets/mobirise-slider-video/script.js"></script>
    <script src="{{url('/')}}/app/assets/formoid/formoid.min.js"></script> 

    <script type="text/javascript">
        $(document).ready(function(){
            $(window).scroll(function(){
                if( $(this).scrollTop() > 50 ) { 
                    // $('navbar').css('top' '0');
                    $('.navbar').removeClass('nav-offset');
                }
                else{
                    // $('navbar').css('top' '50px');
                    $('.navbar').addClass('nav-offset');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>