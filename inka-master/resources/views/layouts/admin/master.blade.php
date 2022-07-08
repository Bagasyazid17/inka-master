<!doctype html>
<html lang="en">

<head>
	<title>Dashboard - INKA</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{url('/')}}/klorofil/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('/')}}/klorofil/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('/')}}/klorofil/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="{{url('/')}}/klorofil/assets/vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{url('/')}}/klorofil/assets/css/main.css">
	<link rel="stylesheet" href="{{url('/')}}/css/style.css">
	
	@stack('stylesheets')

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/klorofil/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{url('/')}}/klorofil/assets/img/favicon.png">

	<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script src="{{url('/')}}/klorofil/assets/vendor/jquery/jquery.min.js"></script>
	<script src="{{url('/')}}/klorofil/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{url('/')}}/klorofil/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{{url('/')}}/klorofil/assets/vendor/toastr/toastr.min.js"></script>
	<script src="{{url('/')}}/klorofil/assets/scripts/klorofil-common.js"></script>
	<script src="{{url('/')}}/js/turbolinks.js"></script>

    @stack('headScripts')

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layouts.admin.partials.navbar')
		<!-- END NAVBAR -->

		<!-- LEFT SIDEBAR -->
		@include('layouts.admin.partials.sidebar')
		<!-- END LEFT SIDEBAR -->

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		@include('layouts.admin.partials.footer')
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script type="text/javascript" data-turbolinks-track="reload">
		function openStatusToast() {
			@if (session('success'))
				toastr.success("{{ session('success') }}", "Sukses!")
			@elseif (session('error'))
				toastr.error("{{ session('error') }}", "Terjadi Kesalahan!")
			@endif
		}

		function humanDate(dateObject) {
			
			return dateObject.getFullYear() + '-' + leftPad(dateObject.getMonth() + 1, 2) + '-' + leftPad(dateObject.getDate(), 2) + ' ' + leftPad(dateObject.getHours(), 2) + ':' + leftPad(dateObject.getMinutes(), 2) + ':' + leftPad(dateObject.getSeconds(), 2);
		}

		function formatTanggal(dateObject) {
			var date=leftPad(dateObject.getDate(), 2);
			var month=leftPad(dateObject.getMonth() + 1, 2);
			var year=dateObject.getFullYear()

			return date+ '-' + month +'-'+ year;
		}

				function testFunct(vari) {


			return vari.id;
		}

		function leftPad(number, digitCount) {
			var numberString = number + '';
			var padCount = digitCount - numberString.length;
			for (i = 0; i < padCount; i++) numberString = '0' + numberString;
			return numberString;
		}

		// toggle function
		$.fn.clickToggle = function( f1, f2 ) {
			return this.each( function() {
				var clicked = false;
				$(this).bind('click', function() {
					if(clicked) {
						clicked = false;
						return f2.apply(this, arguments);
					}

					clicked = true;
					return f1.apply(this, arguments);
				});
			});

		}
		document.addEventListener("turbolinks:load", function() {
			toastr.options.closeButton = true;
			toastr.clear();

			openStatusToast();
		});
	</script>

	@stack('scripts')
</body>

</html>
