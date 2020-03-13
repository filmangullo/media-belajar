@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('style')
<style>
	h1,h2,p,a{
		font-family: sans-serif;
		font-weight: normal;
	}

	.jam-digital-malasngoding {
		overflow: hidden;
		width: 340px;
		margin: 20px auto;
		border: 5px solid #efefef;
	}
	.kotak{
		float: left;
		width: 110px;
		height: 80px;
		background-color: #189fff;
	}
	.jam-digital-malasngoding p {
		color: #fff;
		font-size: 36px;
		text-align: center;
		margin-top: 30px;
	}
</style>
@endsection

@section('header')

<h1 class="text-white">
    {{ $forum->kelasMataPelajarans['nama'] }}
</h1>
<p>{{ $forum->kelasMataPelajarans['keterangan'] }}</p>
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
          <div class="jam-digital-malasngoding">
          	<div class="kotak">
          		<p id="jam"></p>
          	</div>
          	<div class="kotak">
          		<p id="menit"></p>
          	</div>
          	<div class="kotak">
          		<p id="detik"></p>
          	</div>
          </div>
          @if (auth::user()->role == 'pengajar')
          <div class="row mb-20">
            <div class="col-md-4">
              	<a href="javascript:void(0);" data-href="{{ route('create.deskripsi', $forum->id) }}" class="primary-btn btn-block text-center openPopup">Tambah Deskripsi</a>
          </div>
          @endif
          </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
									<h4 class="mb-10">Deskripsi / Quotes</h4>
									<div class="wow fadeIn" data-wow-duration="1s">
										@foreach ($deskripsi as $key => $value)
												<p>{{ $value->deskripsi }}</p>
									  @endforeach
									</div>
                    <h4 class="mb-30">Forum Diskusi</h4>
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
        @include('layouts.modal')
@endsection

@section('script')
<script>
	window.setTimeout("waktu()", 1000);

	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu.getHours();
		document.getElementById("menit").innerHTML = waktu.getMinutes();
		document.getElementById("detik").innerHTML = waktu.getSeconds();
	}
</script>
<script>
    $(document).ready(function () {
        $('.openPopup').on('click', function () {
            var dataURL = $(this).attr('data-href');
            $('.modal-dialog').load(dataURL, function () {
                $('#myModal').modal({
                    show: true
                });
            });
        });
    });
</script>
@endsection
