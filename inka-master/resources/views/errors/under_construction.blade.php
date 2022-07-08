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
    
    <title>INKA</title>

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
    
    <style type="text/css">
        .absolute-center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
        }

        .top-nav{
            margin-top: 30px;
        }

        .back-wrapper{
            text-align: center;
        }
    </style>
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
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="absolute-center center">
            @if(Session::get('lang') == 'id')
                <h1>Fitur ini sedang dikembangkan.</h1>
            @elseif(Session::get('lang') == 'en')
                <h1>This feature is being developed.</h1>
            @endif
            <div class="back-wrapper">
                <a href="{{ route('app.index')}}" class="center">
                @if(Session::get('lang') == 'id')
                    Kembali ke Beranda
                @elseif(Session::get('lang') == 'en')
                    Back to Home
                @endif
                </a>
            </div>
        </div>
    </section>

    @include('layouts.app.partials.footer')

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
        
    </script>
</body>
</html>