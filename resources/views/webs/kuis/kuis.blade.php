@extends('layouts.web')

@section('courses')

menu-active

@endsection

@section('style')
<style>
    h1,
    h2,
    p,
    a {
        font-family: sans-serif;
        font-weight: normal;
    }

    .jam-digital-malasngoding {
        overflow: hidden;
        width: 289px;
        margin: 20px auto;
        border: 5px solid #efefef;
    }

    .kotak {
        width: 100%;
        float: left;
        height: 80px;
        background-color: #189fff;
    }

    .jam-digital-malasngoding p {
        color: #fff;
        font-size: 36px;
        text-align: center;
        margin-top: 30px;
    }

</style>
@endsection

@section('header')
<h1 class="text-white">
    Kuis {{ $forum->kelasMataPelajarans['nama'] }}
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
        <a href="{{ route('index.kuis', $forum->id )}}">Kerjakan Kuis</a>
    </span>
</div>
@endsection

@section('content')
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            @if ($display_soal == true )
                <div class="jam-digital-malasngoding">
                    <div class="kotak">
                        <p id="time">{{count($kuis) * 2.5}}:00</p>
                    </div>
                </div>
            @endif
            
            @include('layouts.alert')
            <center>
                <h3>Nilai Kuis : {{ $nilai_kuis }}</h3>
            </center>
            @if ($display_soal == false)
            <div class="text-center">
                <img src="{{ URL::asset('webs/img/semangat.gif') }}" alt="">
            </div>
            @endif

            <div @if ( $display_soal == true ) style="display:block" @else style="display:none" @endif>

                <h3 class="mb-30">Soal Kuis</h3>
                <form action="{{ route('index.calculateKuis', $forum->id )}}" method="post" id="myFormKuis">
                    {{ csrf_field() }}
                    <div class="row">
                        <?php $num = 0; ?>
                        <?php foreach ($kuis as $key => $soal): ?>
                        <div class="col-lg-12">
                            <blockquote class="generic-blockquote">
                                <input type="number" id="id_soal" name="soal_ke_[{{$key}}]" value="{{ $soal->id }}"
                                    hidden>
                                <p> {{++$num}}. {!! $soal->soal !!}</p>
                                <?php foreach ($soal->forumKuisImgs as $key => $img): ?>
                                      <img src="{{asset('storage/'.$img->img)}}" alt="Girl in a jacket" width="50%">
                                <?php endforeach; ?>
                                <br />
                                <input type="radio" id="pilihan_a[{{$key}}]" name="jawaban_ke_[{{$key}}]" value="a">
                                <label for="pilihan_a[{{$key}}]">{!! $soal->pilihan_a !!}</label><br>

                                <input type="radio" id="pilihan_b[{{$key}}]" name="jawaban_ke_[{{$key}}]" value="b">
                                <label for="pilihan_b[{{$key}}]">{!! $soal->pilihan_b !!}</label><br>

                                <input type="radio" id="pilihan_c[{{$key}}]" name="jawaban_ke_[{{$key}}]" value="c">
                                <label for="pilihan_c[{{$key}}]">{!! $soal->pilihan_c !!}</label><br>

                                <input type="radio" id="pilihan_d[{{$key}}]" name="jawaban_ke_[{{$key}}]" value="d">
                                <label for="pilihan_d[{{$key}}]">{!! $soal->pilihan_d !!}</label><br>

                                <input type="radio" id="pilihan_e[{{$key}}]" name="jawaban_ke_[{{$key}}]" value="e">
                                <label for="pilihan_e[{{$key}}]">{!! $soal->pilihan_e !!}</label><br>
                                <!-- Terpilih otomatis jika tidak di jawab -->
                                <input type="radio" id="pilihan_a" name="jawaban_ke_[{{$key}}]" select hidden
                                    value="null">
                            </blockquote>
                        </div>
                        <?php endforeach; ?>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="genric-btn success">Selesai Kuis..!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            // timer = duration;
            if ({{$display_soal}} == true)
            document.getElementById("myFormKuis").submit();
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * {{count($kuis) * 2.5}}  ,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);

};


</script>

@endsection