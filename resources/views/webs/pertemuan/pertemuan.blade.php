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
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h3 class="mb-30">Form Element</h3>
                    <form action="#">
                        <div class="mt-10">
                            <textarea class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"
                             required></textarea>
                        </div>
                        <div class="mt-10">
                            <input type="text" name="first_name" placeholder="Secondary color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Secondary color'"
                             required class="single-input-secondary">
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-4 mt-sm-30">
                            <div class="single-element-widget mt-30 ">
                                <h3 class="mb-30 ">Participant</h3>
                                <div class="switch-wrap d-flex justify-content-between ">
                                    <p>01. Sample Checkbox</p>
                                    <div class="primary-checkbox ">
                                        <input type="checkbox " id="default-checkbox ">
                                        <label for="default-checkbox "></label>
                                    </div>
                                </div>
                                <div class="switch-wrap d-flex justify-content-between ">
                                    <p>02. Primary Color Checkbox</p>
                                    <div class="primary-checkbox ">
                                        <input type="checkbox " id="primary-checkbox " checked>
                                        <label for="primary-checkbox "></label>
                                    </div>
                                </div>
                                <div class="switch-wrap d-flex justify-content-between ">
                                    <p>03. Confirm Color Checkbox</p>
                                    <div class="confirm-checkbox ">
                                        <input type="checkbox " id="confirm-checkbox ">
                                        <label for="confirm-checkbox "></label>
                                    </div>
                                </div>
                                <div class="switch-wrap d-flex justify-content-between ">
                                    <p>04. Disabled Checkbox</p>
                                    <div class="disabled-checkbox ">
                                        <input type="checkbox " id="disabled-checkbox " disabled>
                                        <label for="disabled-checkbox "></label>
                                    </div>
                                </div>
                                <div class="switch-wrap d-flex justify-content-between ">
                                    <p>05. Disabled Checkbox active</p>
                                    <div class="disabled-checkbox ">
                                        <input type="checkbox " id="disabled-checkbox-active " checked disabled>
                                        <label for="disabled-checkbox-active "></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Align Area -->
@endsection
