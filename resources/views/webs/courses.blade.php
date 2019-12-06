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
<!--Start Feature Area -->
<section class="feature-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h1>Features That Make Us Hero</h1>
                    <p>
                        If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for
                        as low as $.17 each.
                    </p>
                </div>
            </div>
        </div>
        <div class="feature-inner row">
            @foreach ($kelas as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <i class="fa fa-book"></i>
                        <h4><a href="{{ route('show.courses', $item->id) }}">{{ $item->nama }}</a></h4>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
                            <p>
                                {{ $item->keterangan }}.
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End Feature Area -->
@endsection
