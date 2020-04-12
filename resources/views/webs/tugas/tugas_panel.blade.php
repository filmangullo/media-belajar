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
                <div class="col-md-6 text-center">
                    <a href="javascript:void(0);" data-href="{{ route('create_tugas.tugaspanel', $forum->id) }}"
                        class="primary-btn text-center openPopup">Buat Tugas Baru</a>
                </div>
                <div class="col-md-6 text-center">
                    <a href="javascript:void(0);" data-href="{{ route('open_file.tugaspanel', $forum->id) }}"
                        class="primary-btn text-center openPopup">Upload Tugas Baru</a>
                </div>
                <div class="col-md-12 text-center">
                    ||||||||||||||||||||||||||||||||||||||||||||||
                </div>
                <div class="col-md-4 text-center">
                  <form action="{{ route('update_panel.tugaspanel', $panel->id ) }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <label for="cars">Status Tugas : {{ $panel->open_tugas == true ? "Open" : "Close" }}</label>
                    <select id="open_tugas" name="open_tugas" class="form-control">
                      <option value="true" {{ $panel->open_tugas == true ? "selected" : ""}}>Open</option>
                      <option value="false" {{ $panel->open_tugas == false ? "selected" : ""}}>Close</option>
                    </select>
                </div>
                <div class="col-md-4 text-center">
                  <label for="cars">Deadline: {{ $panel->deadline == null ? "Belum set" :  date_format($panel->deadline, "d M yy, H:i" ) }}</label>
                  <input type="datetime-local" id="open_soal" name="deadline" value="" class="form-control">
                </div>
                <div class="col-md-4 text-center">
                  <label for="cars">Save Setelah Melakukan Perubahan..!</label>
                    <button type="submit" class="genric-btn primary btn-block medium radius form-control ">Save</button>
                </div>
                </form>
            </div>

            @endif

            <h3 class="mb-10">Soal Kuis</h3>
            <div class="row">
              @foreach ($tugas as $key => $value)
              <div class="col-lg-12">
                <div class="row mb-10">
                    <div class="col-md-2 offset-md-8">
                        <a href="javascript:void(0);" data-href="" class="genric-btn info btn-block text-center openPopup">Edit</a>
                    </div>
                    <div class="col-md-2">
                        <form action="" method="post">
                            <input class="genric-btn danger btn-block text-center" type="submit" value="Delete"
                                onclick="return confirm('Are you sure you want to delete this item?');" />
                            @method('delete')
                            @csrf
                        </form>
                    </div>
                </div>
                @if ($value->tipe == "TXT")
                  <blockquote class="generic-blockquote">
                    <p></p>
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
