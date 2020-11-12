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
        <a href="{{ route('index.kuis', $forum->id )}}">Daftar Tugas</a>
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
            @foreach ($tugasKumpul as $key => $item)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <th>{{ $item->users['name'] }}</th>
                <th>{{ $item->users['role'] }}</th>
                <th>{{ date_format($item->created_at, "F d, Y H:i" ) }}</th>
                <th>{{ $item->nilai == null ? 'kosong' : $item->nilai }}</th>
                <th><a href="{{ route('show.tugaspelajar', $item->id )}}" class="btn btn-info">Show</a></th>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
