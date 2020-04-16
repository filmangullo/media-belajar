@extends('layouts.web')

@section('courses')

menu-active

@endsection


@section('header')
<h1 class="text-white">
    Tugas Panel - Create Tugas
</h1>
<p>{{ $forum->kelasMataPelajarans['nama'] }} - {{$forum->nama}}</p>
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
        <a href="{{ route('index.tugaspanel', $forum->id )}}">Tugas Panel</a>
    </span>
</div>
@endsection

@section('content')
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            @include('layouts.alert')
            <h3 class="mb-10">Tugas Baru</h3>

            <form action="{{route('store_tugas.tugaspanel', $forum->id)}}" method="post">
              {{ csrf_field() }}
              <textarea id="summernote" name="tugas" required></textarea>

              <div class="section-top-border">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Keterangan</span>
                  </div>
                  <textarea class="form-control" aria-label="With textarea" name="keterangan" required></textarea>
                </div>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('index.tugaspanel', $forum->id )}}" class="btn btn-secondary" data-dismiss="modal">Close</a>
              </div>
            </form>
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
        height:300
      });
  });
</script>
@endsection
