@extends('layouts.web')

@section('header')

<h1 class="text-white">
    Profil
</h1>
<p>Dalam pengajaran modern, mungkin tidak ada satu pun lompatan ke depan selain pembangunan dan memberikan cara yang inovasi.</p>
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

@endsection