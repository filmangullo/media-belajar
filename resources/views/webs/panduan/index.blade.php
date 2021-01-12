@extends('layouts.web')

@section('panduan')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    Panduan
</h1>
<p>Dalam pengajaran modern, mungkin tidak ada satu pun lompatan ke depan selain pembangunan dan memberikan cara yang inovasi.</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('panduan.index') }}">Panduan</a>
    </span>
</div>
@endsection

@section('content')
<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div>
            <h4>Membuat Akun</h4>
            <ul>
                <li>1. Pada Tampilan halaman beranda terdapat beberapa menu dibagian kanan atas klik menu Register untuk membuat akun seperti gmbar dibawah ini :</li>
                <img src="{{ URL::asset('webs/img/Screenshotfrom2020-12-2721.png') }}">
                <li>2. Setelah mengklik menu Register akan tampil halaman Register.</li>
                <li>3. Mengisi data diri seperti (nama, E-mail yang aktif, password, instansi, nomor telepon, dan level akun ) kemudian setelah mengisi data diri klik tombol Register yang berada dibawah</li>
                <img src="{{ URL::asset('webs/img/Screenshotfrom2020-12-2722.png') }}">
            </ul>

            <h5>Untuk panduan lengkap datap di download pada link berikut :</h5>
            <a href="{{ URL::asset('panduan.docx') }}" download="{{ URL::asset('panduan.docx') }}">{{ URL::asset('panduan.docx') }}</a>
        </div>

    </div>
</section>

@endsection