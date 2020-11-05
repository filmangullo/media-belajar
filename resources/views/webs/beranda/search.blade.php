@extends('layouts.web')


@section('header')
<h1 class="text-white">
    Pencarian
</h1>
<p>Dalam pengajaran modern, mungkin tidak ada satu pun lompatan ke depan selain pembangunan dan memberikan cara yang inovasi.</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('index.courses') }}">Hasil Pencarian Pembelajaran</a>
    </span>
</div>
@endsection

@section('content')
<!--Start Feature Area -->
<section class="feature-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="input-wrap">
    						<form action="{{route('index.search')}}" class="form-box d-flex justify-content-between" method="get" enctype="multipart/form-data">
    							<input type="text" placeholder="Cari Kelas" class="form-control" name="search">
    							<button type="submit" class="btn search-btn">Cari</button>
    						</form>
    					</div>
                <div class="section-title text-center">
                    <h1>Kelas / Forum</h1>
                    <p>
                        Selamat mengikuti forum pada kelas pembelajaran, semoga anda sukses dalam forum yang disediakan
                    </p>
                      {!!$alert!!}
                    <div class="button-group-area mt-10 text-center">
                      @auth
              				@if(Auth::user()->role == 'pengajar')
              				<a href="{{ route('create.courses')}}" class="genric-btn primary circle arrow">Tambah Kelas Baru<span class="lnr lnr-database"></span></a>
                      @endif
                      @endauth
              			</div>
                </div>

            </div>
        </div>
        <div class="feature-inner row">
            @foreach ($query as $item)
                <div class="col-lg-4 col-md-6">
                  @auth
                  @if ( Auth::user()->id == $item->user_id )
                    <form action="{{ route('destroy.courses', $item->id )}}" method="post">
                        <input class="genric-btn danger-border float-right" type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');" />
                        @method('delete')
                        @csrf
                    </form>
                  @endif
                  @endauth


                    <div class="feature-item">
                        <p>
                          <i class="fa fa-book"></i>&nbsp;{{ $item->users['name'] }}
                        </p>
                        <h4><a href="{{ route('show.courses', $item->id) }}">{{ $item->nama }}</a></h4>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
                            <p>
                                {{ substr($item->keterangan,0,60).'...' }}
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
