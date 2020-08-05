@extends('layouts.web')

@section('style')
    <style>
      .div-avatar {
        justify-content: center;
        text-align: center;
      }
      .avatar {
        vertical-align: middle;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        margin: auto;
        
      }
    </style>
@endsection

@section('header')
<h1 class="text-white">
    Profil
</h1>
<p>Dalam pengajaran modern, mungkin tidak ada satu pun lompatan ke depan selain pembangunan dan memberikan cara yang inovasi.</p>
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
<section class="contact-page-area section-gap">
    <div class="container">
      <div class="div-avatar">
        @if ($user->avatar == null)
          <img src="{{asset($user['role'].'.png')}}" alt="Avatar" class="avatar">     
        @else
            
        @endif
        
      </div>
      <div class="section-top-border">
        <div class="progress-table-wrap">
          <div class="progress-table" >
            <div class="table-row">
              <div class="country">Nama</div>
              <div class="visit">:</div>
              <div class="percentage">{{ $user->name }}</div>
            </div>

            <div class="table-row">
              <div class="country">Email</div>
              <div class="visit">:</div>
              <div class="percentage">{{ $user->email }}</div>
            </div>
            
            <div class="table-row">
              <div class="country">Telp/Hp</div>
              <div class="visit">:</div>
              <div class="percentage">{{ $user->phone }}</div>
            </div>

            <div class="table-row">
              <div class="country">@if ($user->role == 'pengajar')
                  NIP
              @elseif($user->role == 'pelajar')
                  NIS
              @endif </div>
              <div class="visit">:</div>
              <div class="percentage">{{ $user->nip }}</div>
            </div>

            <div class="table-row">
              <div class="country">Jurusan</div>
              <div class="visit">:</div>
              <div class="percentage">{{ $user->Jurusan }}</div>
            </div>

            <div class="table-row">
              <div class="country">Level</div>
              <div class="visit">:</div>
              <div class="percentage">{{ strtoupper($user->role) }}</div>
            </div>

          </div>
        </div>
      </div>
      <?php if (Auth::user()->id == $user->id): ?>
        <div class="col-lg-12">
            <div class="alert-msg" style="text-align: center;"></div>
            <a href="{{ route('edit.profil', $user->id) }}" class="primary-btn" >Edit Profil</a>
        </div>
      <?php endif; ?>

    </div>
</section>
@endsection
