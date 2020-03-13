@extends('layouts.web')

@section('about')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    About
</h1>
<p>In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of
    the space telescope.</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="courses.html">About</a>
    </span>
</div>

@endsection

@section('content')
<!-- Start About Area -->
<section class="about-area section-gap">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-6 about-left">
                <img class="img-fluid" src="{{ URL::asset('web/img/about.jpg') }}" alt="">
            </div>
            <div class="offset-lg-1 col-lg-6 offset-md-0 col-md-12 about-right">
                <h1>
                    Educature <br> Solid Outcome
                </h1>
                <div class="wow fadeIn" data-wow-duration="1s">
                    <p>
                        There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think
                        about setting up your own viewing station. In the life of any aspiring astronomer that it is time to buy that first
                        telescope. It’s exciting to think about setting up your own viewing station.
                    </p>
                </div>
                <a href="courses.html" class="primary-btn">Explore Courses</a>
            </div>
        </div>
    </div>
</section>
<!-- End About Area -->
@endsection
