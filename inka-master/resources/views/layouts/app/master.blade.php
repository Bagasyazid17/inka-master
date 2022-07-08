<!DOCTYPE html>
<html class="no-js">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125876363-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-125876363-1');
        </script>

        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        @yield('title')
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Template CSS Files
        ================================================== -->
        <!-- Twitter Bootstraps CSS -->
        <link rel="stylesheet" href="{{url('/')}}/app/css/bootstrap.min.css">
        <!-- Ionicons Fonts Css -->
        <link rel="stylesheet" href="{{url('/')}}/app/css/ionicons.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="{{url('/')}}/app/css/animate.css">
        <!-- Hero area slider css-->
        <link rel="stylesheet" href="{{url('/')}}/app/css/slider.css">
        <!-- owl craousel css -->
        <link rel="stylesheet" href="{{url('/')}}/app/css/owl.carousel.css">
        <link rel="stylesheet" href="{{url('/')}}/app/css/owl.theme.css">
        <link rel="stylesheet" href="{{url('/')}}/app/css/jquery.fancybox.css">
        <!-- template main css file -->
        <link rel="stylesheet" href="{{url('/')}}/app/css/main.css">
        <!-- responsive css -->
        <link rel="stylesheet" href="{{url('/')}}/app/css/responsive.css">
        
        <link href="{{url('/')}}/images/favicon.png" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="{{url('/')}}/klorofil/assets/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Custom Style css -->
        <link rel="stylesheet" href="{{url('/')}}/css/inka.css">

        @stack('stylesheets')

		<!-- Template Javascript Files
        ================================================== -->
        <!-- modernizr js -->
        <script src="{{url('/')}}/app/js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- jquery -->
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script src="{{url('/')}}/klorofil/assets/vendor/jquery/jquery.min.js"></script>
        <!-- owl carouserl js -->
        <script src="{{url('/')}}/app/js/owl.carousel.min.js"></script>
        <!-- bootstrap js -->

        <script src="{{url('/')}}/app/js/bootstrap.min.js"></script>
        <!-- wow js -->
        <script src="{{url('/')}}/app/js/wow.min.js"></script>
        <!-- slider js -->
        <script src="{{url('/')}}/app/js/slider.js"></script>
        <script src="{{url('/')}}/app/js/jquery.fancybox.js"></script>
        <!-- template main js -->
        <script src="{{url('/')}}/app/js/main.js"></script>
		
		<script src="{{url('/')}}/js/turbolinks.js"></script>
        <script src="{{url('/')}}/js/inka.js"></script>
		@stack('headScripts')
	</head>

	<body>
		<!-- NAVBAR -->
		@include('layouts.app.partials.navbar')
		<!-- END NAVBAR -->

		@yield('content')
		{{--
	    <div class="scrollup">
	        <a href="#"><i class="fa fa-chevron-up"></i></a>
	    </div> --}}
        
		<!-- Javascript -->
		<script type="text/javascript" data-turbolinks-track="reload">
			
		</script>

		@stack('scripts')
	</body>

</html>
