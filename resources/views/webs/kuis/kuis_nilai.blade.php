@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('header')

<h1 class="text-white">
    Kuis Nilai
</h1>
<p>{{ $forum->kelasMataPelajarans['nama'] }} - {{$forum->nama}}</p>
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
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Nilai</th>
            <th scope="col">Tanggal dan Waktu</th>
            <th scope="col">Level</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($forum->kelasmatapelajarans->participants as $key => $value)
            <tr>
              <th scope="row">{{ $key+1 }}</th>
              <td>{{ $value->users['name'] }}</td>
              @foreach ($forum->forumKuisNilais as $key => $item)
                  @if ($value->users['id'] ==  $item->user_id)
                    <td> {{ $item->nilai }} </td>
                    <td>{{ date_format($item->created_at, "F d, Y H:i" ) }}</td>
                  @else
                    <td> 0 </td>
                    <td>-</td>
                  @endif
              @endforeach
              <td>{{ strtoupper( $value->users['role'] ) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
