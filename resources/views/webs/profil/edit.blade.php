@extends('layouts.web')

@section('header')

<h1 class="text-white">
    Profil
</h1>
<p>Dalam pengajaran modern, mungkin tidak ada satu pun lompatan ke depan selain pembangunan dan memberikan cara yang
    inovasi.</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a>{{ Auth::user()->name }}</a>
        <i class="lnr lnr-arrow-right"></i>
        <a>Profil</a>
    </span>
</div>

@endsection

@section('content')
<!-- Start contact-page Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8 offset-1">
                    <h3 class="mb-30">Edit Profil</h3>
                    <form action="#">
                        <div class="col-md-12 row"> 

                            <div class="col-md-4">
                                <label for="nama">Nama</label>
                            </div>

                            <div class="col-md-8">
                                <input type="text" id="nama" name="first_name" placeholder="Nama Lengkap" value="{{ $user->name }}" required class="single-input">
                            </div>
                        </div>

                        <div class="col-md-12 row"> 

                            <div class="col-md-4">
                                <label for="nama">Telp / Hp</label>
                            </div>

                            <div class="col-md-8">
                                <input type="tel" id="phone" name="first_name" placeholder="Nomor Telepon / HP" value="{{ $user->phone }}" required class="single-input">
                            </div>
                        </div>
                        
                        <div class="col-md-12 row"> 

                            <div class="col-md-4">
                                <label for="nama">Email</label>
                            </div>

                            <div class="col-md-8">
                                <input type="email" id="email" name="first_name" placeholder="Nama Lengkap" value="{{ $user->phone }}" required class="single-input">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
