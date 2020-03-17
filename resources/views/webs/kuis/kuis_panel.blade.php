@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    Kuis Panel
</h1>
<p>{{ $forum->kelasMataPelajarans['nama'] }}</p>
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
            @include('layouts.alert')
            @if (auth::user()->role == 'pengajar')
            <div class="row mb-10">
                <div class="col-md-12 text-center">
                    <a href="javascript:void(0);" data-href="{{ route('create.kuispanel', $forum->id) }}"
                        class="primary-btn text-center openPopup">Buat Soal Kuis</a>
                </div>
            </div>

            @endif

          <h3 class="mb-10">Soal Kuis</h3>
          <div class="row">
            @foreach ($kuis as $key => $value)
            <div class="col-lg-12">
              <div class="row mb-10">
                  <div class="col-md-2 offset-md-8">
                      <a href="#" class="genric-btn info btn-block text-center">Edit</a>
                  </div>
                  <div class="col-md-2">
                      <form action="{{ route('destroy.kuispanel', $value->id )}}" method="post">
                          <input class="genric-btn danger btn-block text-center" type="submit" value="Delete"
                              onclick="return confirm('Are you sure you want to delete this item?');" />
                          @method('delete')
                          @csrf
                      </form>
                  </div>
              </div>
              <blockquote class="generic-blockquote">
                <p>{{ $key + 1 }}. {{ $value->soal }}</p>
                <ol>
                  <li>a. {{ $value->pilihan_a }}</li>
                  <li>b. {{ $value->pilihan_b }}</li>
                  <li>c. {{ $value->pilihan_c }}</li>
                  <li>d. {{ $value->pilihan_d }}</li>
                  <li>e. {{ $value->pilihan_e }}</li>
                </ol>
              </blockquote>
            </div>
            @endforeach
          </div>
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
