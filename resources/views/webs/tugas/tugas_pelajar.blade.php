@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')
<h1 class="text-white">
    Daftar Tugas {{ $forum->kelasMataPelajarans['nama'] }}
</h1>
<p>{{ $forum->nama }}</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('index.courses') }}">Courses</a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('show.courses', $forum->kelasMataPelajarans['id'] )}}">{{ $forum->kelasMataPelajarans['nama'] }}</a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('index.pertemuan', $forum->id )}}">{{ $forum['nama'] }}</a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('index.tugaspelajar', $forum->id )}}">Daftar Tugas</a>
    </span>
</div>
@endsection

@section('content')
<!-- Start Align Area -->
<div class="whole-wrap">
  <div class="container">
    <div class="section-top-border">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Level</th>
            <th scope="col">Tanggal dan Waktu</th>
            <th scope="col">Nilai</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($results as $key => $item)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <th>{{ $item['nama'] }}</th>
                <th>{{ $item['level'] }}</th>
                <th>{{ $item['tgl_upload'] }}</th>
                <th>{{ $item['tgs_nilai'] }}</th>
                <th><a {!! $item['id_tugas'] != null ? 'href="'.route('show.tugaspelajar', $item['id_tugas'] ).'"' : 'disabled' !!} class="btn btn-info">Show</a></th>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
