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
                @if (auth::user()->role == 'pengajar')
                
                    <a href="{{ route('createForum.courses', $kelas->id)}}" class="primary-btn white">Forum Baru</a>
                @endif

            </div>
            <div class="offset-lg-1 col-lg-6">
                <div class="courses-right">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul class="courses-list">
                                @foreach ($forum as $item)
                                <li>
                                    <a class="wow fadeInLeft" href="{{ route('index.pertemuan', $item->id) }}" data-wow-duration="1s"
                                        data-wow-delay=".1s">
                                        <i class="fa fa-book"></i> {{ $item->nama }}
                                    </a>
                                </li>
                                @endforeach
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
