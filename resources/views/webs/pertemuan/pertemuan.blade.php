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
        <a
            href="{{ route('show.courses', $forum->kelasMataPelajarans['id'] )}}">{{ $forum->kelasMataPelajarans['nama'] }}</a>
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
                    <a href="javascript:void(0);" data-href="{{ route('create.video', $forum->id) }}"
                        class="primary-btn btn-block text-center openPopup">Add Video</a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('index.kuispanel', $forum->id) }}" class="primary-btn btn-block text-center ">Kuis
                        Panel</a>
                </div>

                <div class="col-md-3">
                    <a href="{{ route('index.tugaspanel', $forum->id) }}"
                        class="primary-btn btn-block text-center ">Tugas Panel</a>
                </div>
            </div>
            <div class="row mb-20">
                <div class="col-md-2 offset-md-8">
                    <a href="{{ route('index.kuisnilai', $forum->id)}}" class="primary-btn btn-block text-center ">Nilai
                        Kuis</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('index.tugaspelajar', $forum->id)}}"
                        class="primary-btn btn-block text-center ">Nilai Tugas</a>
                </div>
            </div>
            <div class="row mb-20">
                <div class="col-md-2 offset-md-8">
                    <a href="javascript:void(0)" data-href="{{ route('editForum.courses', $forum->id ) }}"
                        class="genric-btn info btn-block text-center openPopup">Edit</a>
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
                    {{-- video --}}
                    <iframe width="100%" height="400" src="https://prezi.com/view/xABwjkt3XxxjFGZttC3o/" webkitallowfullscreen="1" mozallowfullscreen="1" allowfullscreen="1">
                    </iframe>
                    @foreach ($video as $key => $value)

                        <video width="100%" height="345" controls>
                        <source src="{{asset('storage/'.$value->video)}}" type="video/mp4">
                        <source src="{{asset('storage/'.$value->video)}}" type="video/ogg">
                        Your browser does not support the video tag.
                        </video>
                    @endforeach

                    {{-- End video --}}
                    <h4 class="mb-10">Deskripsi / Quotes</h4>
                    <div class="wow fadeIn" data-wow-duration="1s" style="height:500px;">
                        @foreach ($deskripsi as $key => $value)
                        <p>{{ $value->deskripsi }}. &nbsp;
                            @if (auth::user()->role == 'pengajar')
                                <a href="javascript:void(0)" data-href="{{ route('edit.deskripsi', $value->id) }}"
                                class="openPopup"><i class="lnr lnr-pencil"></i></a>

                                <a href="{{route('destroy.deskripsi', $value->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"
                                    class="openPopup"><i class="lnr lnr-trash" style="color: red"></i></a>
                            @endif
                        </p>
                        @endforeach
                    </div>

                    <div class="wow fadeIn" data-wow-duration="1s">
                        @if($file != null)
                            <h4 class="mb-10">File Materi</h4>
                        @endif
                        @foreach ($file as $key => $value)
                        <p><a href="{{route('download.file', $value->id) }}"><i
                                    class="lnr lnr-download"></i>&nbsp;Download</a>&nbsp;
                            {{ $value->name }}. &nbsp;
                            @if (auth::user()->role == 'pengajar')
                            <a href="{{ route('destroy.file', $value->id) }}" rel="noopener noreferrer"><i
                                    class="lnr lnr-trash"></i></a>
                            @endif
                        </p>
                        @endforeach
                    </div>
                    <div class="comments-area" id="diskusiShow">
                        <h4 class="mb-30">Forum Diskusi</h4>

                        <!--List Diskusi -->
                        @foreach ($diskusi as $key => $value)
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        @if ($value->users['avatar'] != null )
                                        <img src="{{ URL::asset('storage/'.$value->users['avatar']) }}" alt=""
                                            width="40" style="border-radius: 50%;">
                                        @else
                                        <img src="{{asset($value->users['role'].'.png')}}" alt="" width="40">
                                        @endif
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{ $value->users['name'] }}</a></h5>
                                        <p class="date">{{ date_format($value->created_at, "F d, Y" ) }} at
                                            {{ date_format($value->created_at, "H:i:s" ) }} </p>
                                        <p class="comment">
                                            {{ $value->diskusi }} <br>
                                            @if ($value->extension_file != null &&  $value->extension_file ==  'jpeg' || 'png' || 'jpeg')
                                            <img src="{{asset('storage/'.$value->file)}}" alt="" width="90%">
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    @if (Auth::user()->id == $value->user_id)
                                    <a href="javascript:void(0);" data-href="{{ route('edit.diskusi', $value->id) }}"
                                        class="float-right openPopup"
                                        style="color:aqua;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit</a>
                                    @endif
                                    <a href="javascript:void(0);"
                                        data-href="{{ route('create.diskusicomment', $value->id) }}"
                                        class="float-right openPopup" style="color:blue;">Comment</a>
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
                                        @if ($comment->users['avatar'] != null )
                                        <img src="{{ URL::asset('storage/'.$comment->users['avatar']) }}" alt=""
                                            width="40" style="border-radius: 50%;">
                                        @else
                                        <img src="{{asset($comment->users['role'].'.png')}}" alt="" width="40">
                                        @endif

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
                                    <form action="{{ route('destroy.diskusicomment', $comment->id )}}"
                                        class="float-right" method="post">
                                        <input class="text-center" type="submit"
                                            value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete"
                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                            style="color:red; border:none; background-color: transparent" />
                                        @method('delete')
                                        @csrf
                                    </form>

                                    <a href="javascript:void(0);"
                                        data-href="{{ route('edit.diskusicomment', $comment->id) }}"
                                        class="float-right openPopup" style="color:aqua;">Edit</a>
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
                        <a href="{{ route('index.kuis', $forum->id) }}"
                            class="genric-btn btn-block success circle arrow text-center">Mulai Kuis<span
                                class="lnr lnr-arrow-right"></span></a>
                        @endif
                    </div>

                    <div class="single-element-widget mt-30 ">
                        @if ($panelTugas->open_tugas == true || auth::user()->role == 'pengajar')
                        @if ($panelTugas->open_tugas == true )
                        <p>Tugas Telah dibuka,..?</p>
                        <p>Deadline :{{date('d M Y - H:i a',strtotime($panelTugas->deadline))}}</p>
                        @elseif($panelTugas->open_tugas == false)
                        <p>Tugas Belum dibuka,..!</p>
                        @endif
                        @if (strtotime(date('Y/m/d H:i:s')) <= strtotime($panelTugas->deadline))
                            <a href="{{ route('index.tugas', $forum->id) }}"
                                class="genric-btn btn-block info circle arrow text-center">Kerjakan Tugas<span
                                    class="lnr lnr-arrow-right"></span></a>
                            @endif
                            @endif
                    </div>
                    <div class="single-element-widget mt-30 ">
                        <h3 class="mb-30 ">Participant</h3>
                        @foreach ($participant as $key => $value)
                        <div class="switch-wrap d-flex justify-content-between ">
                            <p>{{$key+1}}. <a href="{{ route('index.profil') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('profil-form_{{ $value->users->id }}').submit();">{{ $value->users['name'] }}</a></p>
                            <form id="profil-form_{{ $value->users->id }}" action="{{ route('index.profil') }}"
                                method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $value->users->id }}">
                            </form>




                            @if(Cache::has('user-is-online-' . $value->users['id']))
                            <div class="primary-checkbox ">
                                {!! $value->users['role'] == 'pengajar' ? '<span
                                    class="lnr lnr-briefcase text-success"></span>' :
                                '<span class="lnr lnr-graduation-hat text-success"></span>' !!}
                                @else
                                {!! $value->users['role'] == 'pengajar' ? '<span
                                    class="lnr lnr-briefcase text-secondary"></span>' :
                                '<span class="lnr lnr-graduation-hat text-secondary"></span>' !!}
                                @endif
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

    // Fungsi untuk menampilkan Nama File jika di Upload pada AddFile
    function myFile() {
        var xfile = document.getElementById("fileX").files[0].name;
        document.getElementById("nameFileX").innerHTML = xfile;
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
