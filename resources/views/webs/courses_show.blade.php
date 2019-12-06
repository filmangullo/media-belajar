@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    Courses
</h1>
<p>In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of
    the space telescope.</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="courses.html">Courses</a>
    </span>
</div>
@endsection

@section('content')
<!-- Start Courses Area -->
<section class="courses-area section-gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 about-right">
                <h1>
                    {{ $kelas->nama }}
                </h1>
                <div class="wow fadeIn" data-wow-duration="1s">
                    <p>
                       {{ $kelas->keterangan }}
                    </p>
                </div>
                <a href="courses.html" class="primary-btn white">Forum Baru</a>
            </div>
            <div class="offset-lg-1 col-lg-6">
                <div class="courses-right">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul class="courses-list">
                                <li>
                                    <a class="wow fadeInLeft" href="courses.html" data-wow-duration="1s"
                                        data-wow-delay=".1s">
                                        <i class="fa fa-book"></i> Development
                                    </a>
                                </li>
                                <li>
                                    <a class="wow fadeInLeft" href="courses.html" data-wow-duration="1s"
                                        data-wow-delay=".3s">
                                        <i class="fa fa-book"></i> IT & Software
                                    </a>
                                </li>
                                <li>
                                    <a class="wow fadeInLeft" href="courses.html" data-wow-duration="1s"
                                        data-wow-delay=".5s">
                                        <i class="fa fa-book"></i> Photography
                                    </a>
                                </li>
                                <li>
                                    <a class="wow fadeInLeft" href="courses.html" data-wow-duration="1s"
                                        data-wow-delay=".7s">
                                        <i class="fa fa-book"></i> Language
                                    </a>
                                </li>
                                <li>
                                    <a class="wow fadeInLeft" href="courses.html" data-wow-duration="1s"
                                        data-wow-delay=".9s">
                                        <i class="fa fa-book"></i> Life Science
                                    </a>
                                </li>
                                <li>
                                    <a class="wow fadeInLeft" href="courses.html" data-wow-duration="1s"
                                        data-wow-delay="1.1s">
                                        <i class="fa fa-book"></i> Business
                                    </a>
                                </li>
                                <li>
                                    <a class="wow fadeInLeft" href="courses.html" data-wow-duration="1s"
                                        data-wow-delay="1.3s">
                                        <i class="fa fa-book"></i> Socoal Science
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Courses Area -->
@endsection
