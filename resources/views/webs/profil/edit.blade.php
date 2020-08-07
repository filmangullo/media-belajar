@extends('layouts.web')

@section ('style')
<style>
img{
  max-width:180px;
}
input[type=file]{
padding:10px;
}
</style>
@endsection

@section('header')

<h1 class="text-white">
    Profil
</h1>
<p>Dalam pengajaran modern, mungkin tidak ada satu pun lompatan ke depan selain pembangunan dan memberikan cara yang
    inovasi.</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a>{{ Auth::user()->name }}</a>
        <i class="lnr lnr-arrow-right"></i>
        <a>Profil</a>
    </span>
</div>

@endsection

@section('content')
<!-- Start contact-page Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-10 col-md-10 offset-1">
                    <h3 class="mb-30">Edit Profil</h3>
                    <form action="{{ route('update.profil', $user->id) }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="col-md-12 row">
                          <div class="col-md-4">
                              <img id="blah" src="{{ URL::asset('webs/img/180.png') }}" alt="your image" />
                          </div>
                          <div class="col-md-8">
                              <input type='file' onchange="readURL(this);" />
                          </div>
                        </div>
                        <br>
                        <div class="col-md-12 row">

                            <div class="col-md-4">
                                <label for="nama">Nama</label>
                            </div>

                            <div class="col-md-8">
                                <input type="text" id="nama" name="first_name" placeholder="Nama Lengkap..?" value="{{ $user->name }}" required class="single-input">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 row">

                            <div class="col-md-4">
                                <label for="nama">
                                  @if ($user->role == 'pengajar')
                                    NIP
                                @elseif($user->role == 'pelajar')
                                    NIS
                                @endif </label>
                            </div>

                            <div class="col-md-8">
                                <input type="tel" id="nip" name="nip" placeholder="@if ($user->role == 'pengajar')Nomor Induk Pegawai..? @elseif($user->role == 'pelajar')Nomor Induk Siswa..? @endif" value="{{ $user->nip }}" required class="single-input">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 row">

                            <div class="col-md-4">
                                <label for="phone">Telp / Hp</label>
                            </div>

                            <div class="col-md-8">
                                <input type="tel" id="phone" name="phone" placeholder="Nomor Telepon / HP..?" value="{{ $user->phone }}" required class="single-input">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 row">

                            <div class="col-md-4">
                                <label for="jurusan">Jurusan</label>
                            </div>

                            <div class="col-md-8">
                                <input type="text" id="jurusan" name="Jurusan" placeholder="Jurusan..?" value="{{ $user->Jurusan }}" required class="single-input">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 row">

                            <div class="col-md-4">
                                <label for="email">Email</label>
                            </div>

                            <div class="col-md-8">
                                <input type="email" id="email" name="email" placeholder="Email" value="{{ $user->email }}" required class="single-input">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 row">

                            <div class="col-md-4">
                                <label for="email">Password Baru</label>
                            </div>

                            <div class="col-md-8">
                                <input type="password" id="password" name="password" placeholder="Isi dengan password Baru..?" value="" class="single-input">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 row">
                          <div class="col-md-6">
                              <a class="genric-btn success" href="{{ route('index.profil') }}" onclick="event.preventDefault();
    															document.getElementById('profil-form').submit();">Kembali</a>
    													<form id="profil-form" action="{{ route('index.profil') }}" method="POST" style="display: none;">
    													@csrf
    													<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    													</form>
                          </div>
                          <div class="col-md-4">
                              <button type="submit" class="genric-btn success" style="margin-left:100%;">Simpan</button>
                          </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
  <script type="text/javascript">
  function readURL(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#blah')
                 .attr('src', e.target.result);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }
  </script>
@endsection
