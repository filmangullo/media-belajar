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
		<div class="container">
      @include('layouts.alert')
			<div class="row">
				<div class="col-lg-12">
          <form class="form-area contact-form text-right" action="{{ route('store.courses') }}" method="post" >
              {{ csrf_field() }}
              <div class="comment-form">
  						<h4>Buat Kelas Baru</h4>

                <div class="form-group">
                  <select id="type" name="instansi" class="form-control placeholder="Type" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Select Type'"" style="height:40px;">
                    @foreach ($instansis as $key => $value)
                      <option value="{{ $value->id }}">{{ $value->nama }}</option>
                    @endforeach
                  </select>
                </div>
  							<div class="form-group form-inline">
  								<div class="form-group col-lg-6 col-md-12 name">
  									<input type="text" class="form-control" id="name" name="nama" placeholder="Nama Kelas" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
  								</div>
  								<div class="form-group col-lg-6 col-md-12 email">
                    <select id="type" name="type" class="form-control placeholder="Type" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Select Type'"" style="height:40px;">
                      <option value="Private">Private</option>
                      <option value="Public">Public</option>
                    </select>
                  </div>
  							</div>
  							<div class="form-group">
  								<input type="text" class="form-control" id="subject" name="enroll_key" placeholder="Enroll Key" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
  							</div>
  							<div class="form-group">
  								<textarea class="form-control mb-10" rows="5" name="keterangan" placeholder="keterangan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
  								 required=""></textarea>
  							</div>
  							<button type="submit" class="primary-btn">Save</a>

  					</div>
					</form>
				</div>
			</div>
		</div>
	<!-- End contact-page Area -->
@endsection
