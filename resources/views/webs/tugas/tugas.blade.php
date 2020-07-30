@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    Tugas {{ $forum->kelasMataPelajarans['nama'] }}
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
        <a href="{{ route('index.tugas', $forum->id )}}">Kerjakan Tugas</a>
    </span>
</div>
@endsection

@section('content')
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
          @include('layouts.alert')
            <div class="col-lg-12 text-center">
              <h3 class="mb-30">Tugas</h3>
            </div>
            <div class="row">
              @foreach ($tugas as $key => $value)
              <div class="col-lg-12">
                @if ($value->tipe == "TXT")
                  <blockquote class="generic-blockquote">
                    <p>{!! $value->tugas !!}</p>
                    <p>{{$value->keterangan}}</p>
                  </blockquote>
                @elseif($value->tipe == "FLE")
                  <blockquote class="generic-blockquote">
                    <p><a href="{{route('download.tugasonpanel', $value->id) }}"  ><i class="lnr lnr-download"></i>&nbsp;Download</a>&nbsp;
                      {{ $value->nama }}. &nbsp;</p>
                    <p>{{$value->keterangan}}</p>
                  </blockquote>
                @endif
              </div>
              @endforeach
            </div>

            <div class="row">
              <div class="col-lg-12 text-center">
                <h3 class="mb-30">Kerjakan Tugas</h3>
              </div>

              <form action="{{route('store.tugas', $forum->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-lg-12">
                  <div class="input-group" style="margin: 0 auto;">
                    <textarea id="summernote" name="tugas" required>{!!$tugasKumpul!!}</textarea>
                  </div>
                </div>
                {{ $tugasKumpul}}
                {{-- @if ()
                    
                @endif --}}
                <div class="col-lg-12">
                  <div class="input-group mt-20">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Lampirkan File</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="file" name="file" onchange="myFunction()" required>
                      <label class="custom-file-label" for="file"><span id="nameFile">Pilih File</span></label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 text-center mt-20">
                  <button type="submit" class="genric-btn primary circle arrow">Submite<span
                          class="lnr lnr-location"></span></button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->
@endsection

@section('script')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>>
<script>
  $(document).ready(function() {
      $('#summernote').summernote({
        height:300,
      });
  });
</script>

<script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("file").files[0].name;
      document.getElementById("nameFile").innerHTML = x;
    }
</script>
@endsection
