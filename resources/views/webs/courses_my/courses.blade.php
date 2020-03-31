@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    My Courses
</h1>
<p>In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of
    the space telescope.</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('index.courses') }}">My Courses</a>
    </span>
</div>
@endsection

@section('content')
<!--Start Feature Area -->
<section class="feature-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h1>Kelas / Forum</h1>
                    <p>
                        Selamat mengikuti forum pada kelas pembelajaran, semoga anda sukses dalam forum yang disediakan
                    </p>
                    <div class="button-group-area mt-10 text-center">
              				@if(Auth::user()->role == 'pengajar')
              				<a href="{{ route('create.courses')}}" class="genric-btn primary circle arrow">Tambah Kelas Baru<span class="lnr lnr-database"></span></a>
                      @endif
              			</div>
                </div>

            </div>
        </div>
        <div class="feature-inner row">
            @foreach ($kelas as $item)
                <div class="col-lg-4 col-md-6">
                  @if ( Auth::user()->id == $item->user_id )
                    <form action="{{ route('destroy.courses', $item->id )}}" method="post">
                        <input class="genric-btn danger-border float-right" type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');" />
                        @method('delete')
                        @csrf
                    </form>
                  @endifx


                    <div class="feature-item">
                        <p>
                          <i class="fa fa-book"></i>&nbsp;{{ $item->kelasMataPelajarans->users['name'] }}
                        </p>
                        <h4><a href="{{ route('show.courses', $item->kelasMataPelajarans['id']) }}">{{ $item->kelasMataPelajarans['nama'] }}</a></h4>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
                            <p>
                                {{ substr($item->kelasMataPelajarans['keterangan'],0,60).'...' }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End Feature Area -->
@endsection
