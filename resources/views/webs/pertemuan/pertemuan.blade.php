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
        float: left;
        width: 93px;
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
    {{ $forum->kelasMataPelajarans['nama'] }}
</h1>
<p>{{ $forum->kelasMataPelajarans['keterangan'] }}</p>
<div class="link-nav">
    <span class="box">
        <a href="/">Home </a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('index.courses') }}">Courses</a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('show.courses', $forum->kelasMataPelajarans['id'] )}}">{{ $forum->kelasMataPelajarans['nama'] }}</a>
        <i class="lnr lnr-arrow-right"></i>
        <a href="{{ route('index.pertemuan', $forum->id )}}">{{ $forum['nama'] }}</a>

    </span>
</div>
@endsection

@section('content')
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            @include('layouts.alert')
            <div class="jam-digital-malasngoding">
                <div class="kotak">
                    <p id="jam"></p>
                </div>
                <div class="kotak">
                    <p id="menit"></p>
                </div>
                <div class="kotak">
                    <p id="detik"></p>
                </div>
            </div>
            <!-- <object width="400" height="400" data="{{URL::asset('398847530-Laravel-Framework-pptx.pptx')}}"> -->
</object>
            <!-- <iframe src="{{URL::asset('398847530-Laravel-Framework-pptx.pptx')}}" width="800px" heigt="600px"></iframe> -->
            <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=[{{URL::asset('398847530-Laravel-Framework-pptx.pptx')}}]' width='100%' height='600px' frameborder='0'> -->
            <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{URL::asset('398847530-Laravel-Framework-pptx.pptx')}}' width='962px' height='565px' frameborder='0'></iframe> -->
            <!-- <iframe src="https://docs.google.com/gview?url={{URL::asset('398847530-Laravel-Framework-pptx.pptx')}}&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe> -->
            <!-- <iframe src="http://docs.google.com/gview?url={{URL::asset('Sample_12.ppt')}}&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe> -->
            <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{URL::asset('Sample_12.ppt')}}' width='962px' height='565px' frameborder='0'></iframe> -->
            <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{URL::asset('398847530-Laravel-Framework-pptx.pptx')}}' width='80%' height='565px' frameborder='0'> </iframe> -->
            <!-- <iframe src="https://docs.google.com/gview?url={{URL::asset('Sample_12.ppt')}}"></iframe> -->
            <!-- <iframe src="https://view.officeapps.live.com/op/view.aspx?src=" frameborder="0" style="width:100%;min-height:640px;"></iframe> -->
<iframe src='https://view.officeapps.live.com/op/embed.aspx?src={urlencode({{URL::asset('398847530-Laravel-Framework-pptx.pptx')}})}' width='962px' height='565px' frameborder='0'></iframe>
            @if (auth::user()->role == 'pengajar')
            <div class="row mb-20">
                <div class="col-md-2">
                    <a href="javascript:void(0);" data-href="{{ route('create.deskripsi', $forum->id) }}"
                        class="primary-btn btn-block text-center openPopup">Add Deskripsi</a>
                </div>
                <div class="col-md-2">
                    <a href="javascript:void(0);" data-href="{{ route('create.file', $forum->id) }}"
                        class="primary-btn btn-block text-center openPopup">Add File</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('index.kuispanel', $forum->id) }}"
                        class="primary-btn btn-block text-center ">Kuis Panel</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('index.kuisnilai', $forum->id)}}"
                        class="primary-btn btn-block text-center ">Kuis Nilai</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('index.tugaspanel', $forum->id) }}"
                        class="primary-btn btn-block text-center ">Tugas Panel</a>
                </div>
            </div>
            <div class="row mb-20">
                <div class="col-md-2 offset-md-8">
                    <a href="javascript:void(0)" data-href="{{ route('editForum.courses', $forum->id ) }}" class="genric-btn info btn-block text-center openPopup">Edit</a>
                </div>
                <div class="col-md-2">
                    <form action="{{ route('destroyForum.courses', $forum->id )}}" method="post">
                        <input class="genric-btn danger btn-block text-center" type="submit" value="Delete"
                            onclick="return confirm('Are you sure you want to delete this item?');" />
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h4 class="mb-10">Deskripsi / Quotes</h4>
                    <div class="wow fadeIn" data-wow-duration="1s">
                        @foreach ($deskripsi as $key => $value)
                        <p>{{ $value->deskripsi }}. &nbsp;
                            @if (auth::user()->role == 'pengajar')
                                <a href="javascript:void(0)" data-href="{{route('edit.deskripsi', $value->id) }}" class="openPopup" ><i class="lnr lnr-pencil"></i></a>
                            @endif
                        </p>
                        @endforeach
                    </div>

                    <div class="wow fadeIn" data-wow-duration="1s">
                      @if($file != null)
                      <h4 class="mb-10">File Materi</h4>
                      @endif
                        @foreach ($file as $key => $value)
                        <p><a href="{{route('download.file', $value->id) }}"  ><i class="lnr lnr-download"></i>&nbsp;Download</a>&nbsp;
                          {{ $value->name }}. &nbsp;</p>
                        @endforeach
                    </div>
                    <div class="comments-area">
                        <h4 class="mb-30">Forum Diskusi</h4>

                        <!--List Diskusi -->
                        @foreach ($diskusi as $key => $value)
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{asset($value->users['role'].'.png')}}" alt="" width="40">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{ $value->users['name'] }}</a></h5>
                                        <p class="date">{{ date_format($value->created_at, "F d, Y" ) }} at
                                            {{ date_format($value->created_at, "H:i:s" ) }} </p>
                                        <p class="comment">
                                            {{ $value->diskusi }}
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    @if (Auth::user()->id == $value->user_id)
                                        <a href="javascript:void(0);" data-href="{{ route('edit.diskusi', $value->id) }}"
                                        class="genric-btn warning-border radius float-right openPopup">Edit</a>
                                    @endif
                                    <a href="javascript:void(0);"
                                        data-href="{{ route('create.diskusicomment', $value->id) }}"
                                        class="genric-btn primary-border radius float-right openPopup">Comment</a>
                                </div>
                            </div>
                        </div>
                        <!-- List Coment Diskusi -->
                        @foreach ($comments as $key => $comment)
                        @if($value->id == $comment->forum_diskusi_id)
                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{asset($comment->users['role'].'.png')}}" alt="" width="40">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{ $comment->users['name'] }}</a></h5>
                                        <p class="date">{{ date_format($comment->created_at, "F d, Y" ) }} at
                                            {{ date_format($comment->created_at, "H:i:s" ) }}</p>
                                        <p class="comment">
                                            {{ $comment->comment }}
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    @if (Auth::user()->id == $comment->user_id)
                                        <form action="{{ route('destroy.diskusicomment', $comment->id )}}" class="float-right" method="post">
                                            <input class="genric-btn danger btn-block text-center" type="submit" value="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');" />
                                            @method('delete')
                                            @csrf
                                        </form>

                                        <a href="javascript:void(0);" data-href="{{ route('edit.diskusicomment', $comment->id) }}"
                                        class="genric-btn warning-border radius float-right openPopup">Edit</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- End List Comment Diskusi -->
                        @endforeach
                        <!-- End List Diskusi -->

                    </div>
				   <!-- Diskusi Form -->
				   @include('webs.pertemuan.diskusi')
				   <!-- End Diskusi Form -->
                </div>
                <div class="col-lg-3 col-md-4 mt-sm-30">
                  <div class="single-element-widget mt-30 ">
                      @if ($panel->open_kuis == true || auth::user()->role == 'pengajar')
                        @if ($panel->open_kuis == true)
                            <p>Kuis Telah dibuka,..?</p>
                        @elseif($panel->open_kuis == false)
                            <p>Kuis Belum dibuka,..!</p>
                        @endif
                        <a href="{{ route('index.kuis', $forum->id) }}" class="genric-btn btn-block success circle arrow text-center">Mulai Kuis<span class="lnr lnr-arrow-right"></span></a>
                      @endif
                  </div>
                    <div class="single-element-widget mt-30 ">
                        <h3 class="mb-30 ">Participant</h3>
                        @foreach ($participant as $key => $value)
                        <div class="switch-wrap d-flex justify-content-between ">
                            <p>{{$key+1}}. {{ $value->users['name'] }}</p>
                            <div class="primary-checkbox ">
                                {!! $value->users['role'] == 'pengajar' ? '<span class="lnr lnr-briefcase"></span>' :
                                '<span class="lnr lnr-graduation-hat"></span>' !!}

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->
@include('layouts.modal')
@endsection

@section('script')
<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }

</script>
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
