@extends('layouts.web')

@section('tentang')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    Tentang Kami
</h1>
<p>Dalam pengajaran modern, mungkin tidak ada satu pun lompatan ke depan selain pembangunan dan memberikan cara yang inovasi.</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('tentang') }}">Tentang</a>
    </span>
</div>
@endsection

@section('content')
<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            <img src="{{asset('pengembang.jpeg')}}" alt="Girl in a jacket" width="200">
            </div>
            <div class="col-lg-6 d-flex flex-column address-wrap">
                <div class="single-contact-address d-flex flex-row">
                    
                    <div class="contact-details">
                        <h5>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: M. Faisal Faturrahman</h5>
                
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                   
                    <div class="contact-details">
                        <p>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : faisalfaturrahman@koranpsms.com</p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                   
                    <div class="contact-details">
                        <p>whatsapp&nbsp; : 0821-6008-2840</p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                   
                    <div class="contact-details">
                        <p>Pria ini Lahir medan 16 januari 1996 anak pertama dari bapak Alm.abdul syukur mahasiswa di Fakultas Teknik jurusan Pendidikan Teknik Elektro Tahun 2014 Universitas Negeri Medan, pernah bersekolah di SDN 067978(2002-2008), SMPIT Al Fityan School Medan(2008-2011), SMKN Binaan Provsu Medan(20011-2014).   </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->
@endsection