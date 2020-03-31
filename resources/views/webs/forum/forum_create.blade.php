@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    Create New Forum
</h1>
<p>In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of
    the space telescope.</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="courses.html">Courses</a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="courses.html">New Forum</a>
    </span>
</div>
@endsection

@section('content')
<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form class="form-area contact-form text-right" action="{{ route('storeForum.courses', $id ) }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label for="" style="float:left;">Nama Forum / Pertemuan</label>
                            <input name="nama" placeholder="Enter Name Forum / Pertemuan"  class="common-input mb-20 form-control"
                                required="" type="text">
                        </div>
                        <div class="col-lg-12">
                            <div class="alert-msg" style="text-align: left;"></div>
                            <button class="primary-btn" style="float: right;">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->
@endsection
