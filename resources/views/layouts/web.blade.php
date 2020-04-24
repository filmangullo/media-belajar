<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ URL::asset('webs/img/fav.png') }}">
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
			@yield('link')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="{{ URL::asset('webs/css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('webs/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('webs/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('webs/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('webs/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('webs/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('webs/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('webs/css/main.css') }}">
	@yield('style')
</head>

<body>

	<!-- Start Header Area -->
	<header id="header">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
					<a href="/"><img src="{{ URL::asset('webs/img/logo.png') }}" alt="" title="" /></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
                        <li><a href="/">Beranda</a></li>
                        <li class="@yield('courses')"><a href="{{ route('index.courses') }}">Pelajaran</a></li>
												<li class="@yield('about')"><a href="about">About</a></li>
												<li class="@yield('contact')"><a href="{{ route('index.contact') }}">Contact</a></li>
                    @if (Route::has('login'))
						@auth
						<li class="menu-has-children"><a href="#"> {{ Auth::user()->name }}</a>
							<ul>
								<li><a href="blog-home.html">Profil</a></li>
								<li><a href="{{ route('index.my_courses') }}">Pelajaran ku</a></li>
								<hr>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
							</ul>
						</li>
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
			<img src="{{ URL::asset('webs/img/rocket.png') }}" alt="">
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

	<script src="{{ URL::asset('webs/js/vendor/jquery-2.2.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="{{ URL::asset('webs/js/vendor/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="{{ URL::asset('webs/js/easing.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/hoverIntent.js') }}"></script>
	<script src="{{ URL::asset('webs/js/superfish.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/owl.carousel.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/owl-carousel-thumb.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/jquery.sticky.js') }}"></script>
	<script src="{{ URL::asset('webs/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/parallax.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/waypoints.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/wow.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/jquery.counterup.min.js') }}"></script>
	<script src="{{ URL::asset('webs/js/mail-script.js') }}"></script>
	<script src="{{ URL::asset('webs/js/main.js') }}"></script>
	@yield('script')
</body>

</html>
