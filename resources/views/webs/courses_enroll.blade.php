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
	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="fa fa-book"></span>
						</div>
						<div class="contact-details">
							<h5>{{ $data->nama }}</h5>
							<p>
								{{ $data->keterangan }}
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
                    <form class="form-area contact-form text-right" action="{{ route('enrollStore.courses') }}" method="post" >
                        {{ csrf_field() }}
						<div class="row">
							<div class="col-lg-6 form-group">
								<input name="enroll_key" placeholder="Enter Key Enroll" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Key Enroll'"
								 class="common-input mb-20 form-control" required="" type="text">
                            </div>
                            <input type="hidden" name="id_pelajaran" value="{{ $parameterKey }}">
							<div class="col-lg-6">
								<div class="alert-msg" style="text-align: left;"></div>
								<button type="submit" class="primary-btn btn-sm" style="float: right;">Enroll Now</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End contact-page Area -->
@endsection
