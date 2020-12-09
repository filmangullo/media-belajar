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