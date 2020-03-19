@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    Kuis {{ $forum->kelasMataPelajarans['nama'] }}
</h1>
<p>{{ $forum->nama }}</p>
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
      <h3 class="mb-30">Soal Kuis</h3>
      <form action="{{ route('index.calculateKuis', $forum->id )}}" method="post">
        {{ csrf_field() }}
        <div class="row">
          <?php foreach ($kuis as $key => $soal): ?>
            <div class="col-lg-12">
              <blockquote class="generic-blockquote">
                <input type="number" id="id_soal" name="soal_ke_[{{$key}}]" value="{{ $soal->id }}" hidden>
                <p> {!! $soal->soal !!}</p>
                 <input type="radio" id="pilihan_a" name="jawaban_ke_[{{$key}}]" value="a">
                 <label for="pilihan_a">{!! $soal->pilihan_a !!}</label><br>

                 <input type="radio" id="pilihan_b" name="jawaban_ke_[{{$key}}]" value="b">
                 <label for="pilihan_b">{!! $soal->pilihan_b !!}</label><br>

                 <input type="radio" id="pilihan_c" name="jawaban_ke_[{{$key}}]" value="c">
                 <label for="pilihan_c">{!! $soal->pilihan_c !!}</label><br>

                 <input type="radio" id="pilihan_d" name="jawaban_ke_[{{$key}}]" value="d">
                 <label for="pilihan_d">{!! $soal->pilihan_d !!}</label><br>

                 <input type="radio" id="pilihan_e" name="jawaban_ke_[{{$key}}]" value="e">
                 <label for="pilihan_e">{!! $soal->pilihan_e !!}</label><br>
                 <!-- Terpilih otomatis jika tidak di jawab -->
                 <input type="radio" id="pilihan_a" name="jawaban_ke_[{{$key}}]" select hidden value="null">
              </blockquote>
            </div>
          <?php endforeach; ?>
            <div class="col-lg-12 text-center">
              <button type="submit" class="genric-btn success">Selesai Kuis..!</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Align Area -->
@endsection
