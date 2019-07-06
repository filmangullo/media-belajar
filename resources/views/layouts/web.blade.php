<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ URL::asset('web/img/fav.png') }}">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Courses</title>

	<!--
			Google Font
			============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">

	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="{{ URL::asset('web/css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('web/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('web/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('web/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('web/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('web/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('web/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('web/css/main.css') }}">
</head>

<body>

	<!-- Start Header Area -->
	<header id="header">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
					<a href="/"><img src="{{ URL::asset('web/img/logo.png') }}" alt="" title="" /></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
                        <li><a href="/">Home</a></li>
                        <li class="@yield('courses')"><a href="courses">Courses</a></li>
						<li class="@yield('about')"><a href="about">About</a></li>
						<li class="@yield('contact')"><a href="contact.html">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                        <li> <a href="{{ url('/home') }}">Home</a></li>
                        @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>
	<!-- End Header Area -->


	<!-- Start Banner Area -->
	<section class="banner-area relative">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					@yield('header')
				</div>
			</div>
		</div>
		<div class="rocket-img">
			<img src="{{ URL::asset('web/img/rocket.png') }}" alt="">
		</div>
	</section>
	<!-- End Banner Area -->
    
    <!-- Start Content Area -->
        @yield('content')
	<!-- End Content Area -->

	<!-- Start Footer Area -->
        @extends('layouts.webFooter')
	<!-- End Footer Area -->

	<!-- ####################### Start Scroll to Top Area ####################### -->
	<div id="back-top">
		<a title="Go to Top" href="#"></a>
	</div>
	<!-- ####################### End Scroll to Top Area ####################### -->

	<script src="{{ URL::asset('web/js/vendor/jquery-2.2.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="{{ URL::asset('web/js/vendor/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="{{ URL::asset('web/js/easing.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/hoverIntent.js') }}"></script>
	<script src="{{ URL::asset('web/js/superfish.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/owl.carousel.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/owl-carousel-thumb.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/jquery.sticky.js') }}"></script>
	<script src="{{ URL::asset('web/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/parallax.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/waypoints.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/wow.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/jquery.counterup.min.js') }}"></script>
	<script src="{{ URL::asset('web/js/mail-script.js') }}"></script>
	<script src="{{ URL::asset('web/js/main.js') }}"></script>
</body>

</html>