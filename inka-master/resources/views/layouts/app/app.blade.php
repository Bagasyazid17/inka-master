<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125876363-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-125876363-1');
    </script>
    
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
    <link rel="stylesheet" href="{{url('/')}}/app/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/socicon/css/styles.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/theme/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/gallery/style.css">
    <link rel="stylesheet" href="{{url('/')}}/app/assets/mobirise/css/mbr-additional.css" type="text/css">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/inka.css">
    @stack('stylesheets')

    @stack('headScripts')
</head>
<body>
    <div class="top-nav-overlay"></div>
    <section class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-6 top-logo">
                    <a href="{{ route('app.index')}}">
                        <img src="{{url('/')}}/assets/logo/logo-md.png">
                    </a>
                </div>
                <div class="col-sm-6 col-xs-6 lang-menu">
                    <a href="https://mail.inka.co.id" target="_blank" class="inka-web-mail">
                        <i class="fa fa-envelope"></i> INKA WebMail
                    </a>

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
        </div>
    </section>

    <div class="header-wrapper">
        <img src="{{url('/')}}/assets/header.png">                
    </div>

    <section class="menu cid-qDtkfTUzsR" once="menu" id="menu1-z" data-rv-view="1560">
        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm nav-offset">
            <div class="nav-wrapper">

                <div class="container">

                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-start;">
                        <ul class="navbar-nav nav-dropdown nav-left" data-app-modern-menu="true">
                            <li class="nav-item">
                                <a class="nav-link link text-white display-4" href="{{ route('app.index') }}">
                                    @if(Session::get('lang') == 'id')
                                        Beranda
                                    @elseif(Session::get('lang') == 'en')
                                        Home
                                    @endif
                                </a>
                            </li>
                        @foreach(Session::get('menu') as $menu)
                            @if($menu->nama == 'Korporasi' || $menu->nama == 'Corporation')
                            <li class="nav-item dropdown open">
                                <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                    {{$menu->nama}}<br>
                                </a>
                                <div class="dropdown-menu">
                                    @foreach(Session::get('corporation') as $item)
                                        <a class="text-white dropdown-item display-4" href="{{ route('app.corporation.show', ['id' => $item->id]) }}">{{$item->nama}}</a>
                                    @endforeach
                                    @foreach(Session::get('page')->where('menu_id', $menu->id)->where('has_sub', '!=', 2) as $page)
                                        <a class="text-white dropdown-item display-4" href="{{ route('app.page.show', ['id' => $page->id]) }}">{{$page->nama}}</a>
                                        }
                                    @endforeach
                                </div>
                            </li>

                            @elseif($menu->nama == 'Produk' || $menu->nama == 'Product')
                            <li class="nav-item dropdown open">
                                <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                    {{$menu->nama}}<br>
                                </a>
                                <div class="dropdown-menu">
                                    @foreach(Session::get('masterProduct') as $item)
                                        <a class="text-white dropdown-item display-4" href="{{ route('app.product.index', ['id' => $item->id]) }}">
                                        @if(Session::get('lang') == 'id'){{$item->nama_id}}
                                        @elseif(Session::get('lang') == 'en'){{$item->nama_en}}
                                        @endif
                                        </a>
                                    @endforeach
                                    @foreach(Session::get('page')->where('menu_id', $menu->id)->where('has_sub', '!=', 2) as $page)
                                        <a class="text-white dropdown-item display-4" href="{{ route('app.page.show', ['id' => $page->id]) }}">{{$page->nama}}</a>
                                        }
                                    @endforeach
                                </div>
                            </li>

                            @elseif($menu->nama == 'Galeri' || $menu->nama == 'Gallery')
                            <!-- <li class="nav-item dropdown open">
                                <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                    {{$menu->nama}}<br>
                                </a>
                                <div class="dropdown-menu">
                                    @foreach(Session::get('galeri') as $item)
                                        <a class="text-white dropdown-item display-4" href="{{ route('app.galeri.show', ['id' => $item->id]) }}">{{$item->nama}}</a>
                                    @endforeach
                                </div>
                            </li> -->

                            @elseif($menu->nama == 'Stakeholder Relation')
                            <li class="nav-item dropdown open">
                                <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                    {{$menu->nama}}<br>
                                </a>
                                <div class="dropdown-menu">
                                    @foreach(Session::get('masterProcurement') as $item)
                                        @if(sizeof($item->publishedProcurement)>0)
                                            <a class="text-white dropdown-item display-4" href="{{ route('app.procurement.show', ['id' => $item->id]) }}">{{$item->nama}}</a>
                                        @endif
                                    @endforeach
                                    <a class="text-white dropdown-item display-4" href="{{ route('app.karir.index') }}">Karir</a>
                                    <a class="text-white dropdown-item display-4" href="{{ route('app.galeri.index') }}">Galeri</a>
                                    <a class="text-white dropdown-item display-4" href="{{ route('app.contact.index') }}">Kontak</a>
                                    {{--  tambahan untuk WBS -->direct link  --}}
                                    
                                    <a class="text-white dropdown-item display-4" href="{{env('WBS_URL','wbs.inka.int')}}">Whistleblowing System</a>
                                    @foreach(Session::get('page')->where('menu_id', $menu->id)->where('has_sub', '!=', 2) as $page)
                                        <a class="text-white dropdown-item display-4" href="{{ route('app.page.show', ['id' => $page->id]) }}">{{$page->nama}}</a>
                                    @endforeach
                                </div>
                            </li>

                            @elseif($menu->nama == 'Berita')
                            <li class="nav-item">
                                <a class="nav-link link text-white display-4" href="{{ route('app.berita.index') }}">
                                    Berita
                                </a>
                            </li>

                            @elseif($menu->nama == 'Keterbukaan Informasi Publik')
                            <li class="nav-item">
                                <a class="nav-link link text-white display-4" href="{{env('PPID_URL','ppid.inka.int')}}">
                                    Keterbukaan Informasi Publik
                                </a>
                            </li>
                            
                            @elseif($menu->nama == 'Kontak')

                            @elseif($menu->nama == 'Contact Us')
                            <li class="nav-item">
                                <a class="nav-link link text-white display-4" href="{{ route('app.contact.index') }}">
                                    {{$menu->nama}}<br>
                                </a>
                            </li>

                            @else
                            <li class="nav-item dropdown open">
                                <a class="nav-link link text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                                    {{$menu->nama}}<br>
                                </a>
                                <div class="dropdown-menu">
                                    @foreach(Session::get('page')->where('menu_id', $menu->id)->where('has_sub', '!=', 2) as $page)
                                        @if($item->has_sub != 2)
                                        <a class="text-white dropdown-item display-4" href="{{ route('app.page.show', ['id' => $page->id]) }}">{{$page->nama}}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                            @endif

                        @endforeach 
                        </ul>
                    </div>

                </div>

            </div>
        </nav>
    </section>

    <section class="main-content">
        @yield('content')
    </section>

    @yield('footer')

    <script src="{{url('/')}}/app/assets/web/assets/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/app/assets/popper/popper.min.js"></script>
    <script src="{{url('/')}}/app/assets/tether/tether.min.js"></script>
    <script src="{{url('/')}}/app/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/app/assets/smoothscroll/smooth-scroll.js"></script>
    <script src="{{url('/')}}/app/assets/dropdown/js/script.min.js"></script>
    <script src="{{url('/')}}/app/assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="{{url('/')}}/app/assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
    <script src="{{url('/')}}/app/assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
    <script src="{{url('/')}}/app/assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
    <script src="{{url('/')}}/app/assets/masonry/masonry.pkgd.min.js"></script>
    <script src="{{url('/')}}/app/assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{url('/')}}/app/assets/sociallikes/social-likes.js"></script>
    <script src="{{url('/')}}/app/assets/parallax/jarallax.min.js"></script>
    <script src="{{url('/')}}/app/assets/theme/js/script.js"></script>
    <script src="{{url('/')}}/app/assets/gallery/player.min.js"></script>
    <script src="{{url('/')}}/app/assets/gallery/script.js"></script>
    <script src="{{url('/')}}/app/assets/slidervideo/script.js"></script>
    <script src="{{url('/')}}/app/assets/formoid/formoid.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(window).scroll(function(){
                if( $(this).scrollTop() > 70 ) { 
                    // $('navbar').css('top' '0');
                    $('.navbar').removeClass('nav-offset');
                    $('.slider-label-img').css('z-index', 1001);
                    $('.cid-qDtkpaow4r .mbr-slider .carousel-control').css('z-index', 1011);
                }
                else{
                    // $('navbar').css('top' '50px');
                    $('.navbar').addClass('nav-offset');
                    $('.slider-label-img').css('z-index', 1710);
                    $('.cid-qDtkpaow4r .mbr-slider .carousel-control').css('z-index', 1711);
                }
            });

            $(window).scroll(function(){
                if( $(this).scrollTop() > 115 ) { 
                    $('.header-wrapper').css('position', 'fixed');
                    $('.header-wrapper').css('top', '-115px');
                }
                else{
                    $('.header-wrapper').css('position', 'absolute');
                    $('.header-wrapper').css('top', '0');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>