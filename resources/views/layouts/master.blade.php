<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
	<meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
	<title>@yield('title') | Materialize - Material Design Admin Template</title>

	<!-- Favicons-->
	<link rel="icon" href="{{ asset('images/favicon/favicon-32x32.png') }}" sizes="32x32">
	<!-- Favicons-->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon/apple-touch-icon-152x152.png') }}">
	<!-- For iPhone -->
	<meta name="msapplication-TileColor" content="#00bcd4">
	<meta name="msapplication-TileImage" content="{{ asset('images/favicon/mstile-144x144.png') }}">
	<!-- For Windows Phone -->


	<!-- CORE CSS-->
	<link href="{{ HTML::style('css/materialize.min.css') }}" type="text/css" rel="stylesheet">
	<link href="{{ HTML::style('css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<!-- Custome CSS-->    
	<link href="{{ HTML::style('css/custom/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

	<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
	<link href="{{ asset('js/plugins/prism/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
	<!-- Start Page Loading -->
	<div id="loader-wrapper">
		<div id="loader"></div>        
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	<!-- End Page Loading -->

	<!-- //////////////////////////////////////////////////////////////////////////// -->

	<!-- START HEADER -->
	@include('includes/header')
	<!-- END HEADER -->

	<!-- //////////////////////////////////////////////////////////////////////////// -->

	<!-- START MAIN -->
	<div id="main">
		<!-- START WRAPPER -->
		<div class="wrapper">

			<!-- START LEFT SIDEBAR NAV-->
			@include('includes/left-sidebar')
			<!-- END LEFT SIDEBAR NAV-->

			<!-- //////////////////////////////////////////////////////////////////////////// -->

			<!-- START CONTENT -->
			<section id="content">
				@yield('content')
			</section>
			<!-- END CONTENT -->

			<!-- //////////////////////////////////////////////////////////////////////////// -->
			<!-- START RIGHT SIDEBAR NAV-->
			@include('includes/right-sidebar')
			<!-- RIGHT RIGHT SIDEBAR NAV-->

		</div>
		<!-- END WRAPPER -->

	</div>
	<!-- END MAIN -->



	<!-- //////////////////////////////////////////////////////////////////////////// -->

	<!-- START FOOTER -->
	@include('includes/footer')
	<!-- END FOOTER -->
		
		<!-- jQuery Library -->
		<script type="text/javascript" src="{{ asset('js/plugins/jquery-1.11.2.min.js') }}"></script>    
		<!--materialize js-->
		<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
		<!-- prism -->
		<script type="text/javascript" src="{{ asset('js/prism/prism.js') }}"></script>
		<!--scrollbar-->
		<script type="text/javascript" src="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<!-- chartist -->
		<script type="text/javascript" src="{{ asset('js/plugins/chartist-js/chartist.min.js') }}"></script>   
		
		<!--plugins.js - Some Specific JS codes for Plugin Settings-->
		<script type="text/javascript" src="{{ asset('js/plugins.min.js') }}"></script>
		<!--custom-script.js - Add your own theme custom JS-->
		<script type="text/javascript" src="{{ asset('js/custom-script.js') }}"></script>
		
</body>

</html>