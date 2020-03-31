@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')
<h1 class="text-white">
    Tugas Panel
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
            @if (auth::user()->role == 'pengajar')
            <div class="row mb-10">
                <div class="col-md-12 text-center">
                    <a href="javascript:void(0);" data-href="{{ route('create_soal.kuispanel', $forum->id) }}"
                        class="primary-btn text-center openPopup">Buat Tugas Baru</a>
                </div>

                <div class="col-md-6 text-center">
                  <form action="{{ route('update_panel.tugaspanel', $panel->id ) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <label for="cars">Status Tugas :</label>
                    <select id="open_tugas" name="open_tugas" class="form-control">
                      <option value="true" {{ $panel->open_tugas == true ? "selected" : ""}}>Open</option>
                      <option value="false" {{ $panel->open_tugas == false ? "selected" : ""}}>Close</option>
                    </select>
                </div>
                <div class="col-md-6 text-center">
                  <label for="cars">Save Setelah Melakukan Perubahan..!</label>
                    <button type="submit" class="genric-btn primary btn-block medium radius form-control ">Save</button>
                </div>
                </form>
            </div>

            @endif

    </div>
</div>
<!-- End Align Area -->
@include('layouts.modal')
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.openPopup').on('click', function () {
            var dataURL = $(this).attr('data-href');
            $('.modal-dialog').load(dataURL, function () {
                $('#myModal').modal({
                    show: true
                });
            });
        });
    });

</script>
@endsection