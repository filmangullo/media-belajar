@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')
<h1 class="text-white">
    Daftra Tugas {{ $forum->kelasMataPelajarans['nama'] }}
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

          {!! $tugasKumpul->tugas !!}
        </div>
        <div class="section-top-border">
          <p><a href="{{route('download.tugaspelajar', $tugasKumpul->id) }}"  ><i class="lnr lnr-download"></i>&nbsp;Download</a>&nbsp;
            Tugas : {{ $tugasKumpul->users['name']}} &nbsp;</p>
        </div>
    </div>

    <div class="container">
    @include('layouts.alert')
        <form action="{{ route('nilai.tugaspelajar', $tugasKumpul->id) }}" method="post" >
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nilai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input type="number" class="form-control" placeholder="Nilai" aria-label="Nilai" name="nilai" aria-describedby="basic-addon1" value="{{ $tugasKumpul->nilai }}" require>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Catatan</span>
                </div>
                <textarea name="catatan_pengajar" id="catatan_pengajar" rows="10" class="form-control" placeholder="Catatan"  aria-label="Catatan">{!! $tugasKumpul->catatan_pengajar !!}</textarea>
            </div>

            <div class="modal-footer">
                
                <a href="{{ route('index.tugaspelajar', $tugasKumpul->forum_id ) }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
        </form>
    </div>
</div>
<!-- End Align Area -->
@endsection
