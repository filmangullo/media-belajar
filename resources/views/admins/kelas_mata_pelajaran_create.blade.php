@extends('layouts.adm')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelas Mata Mata Pelajaran</h1>
    <p class="mb-4">Data Ini bertujuan untuk Data Kelas yang online yang dibuka pada instansi {{ $instansis->nama }}.
    </p>
    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kelas Mata Pelajaran Baru</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('adm.kelasmatapelajaran.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="instansi_id" value="{{ $instansis->id }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kelas</label>
                            <input type="text" name="nama" class="form-control" placeholder="Input Nama Kelas yang dibuka">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Input Keterangan Kelas">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Enroll Key</label>
                            <input type="text" name="enroll_key" class="form-control" placeholder="Input Enroll Key untuk user masuk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Type</label>
                            <select name="type" class="form-control">
                                <option value="Private">Private</option>
                                <option value="Public">Public</option>
                            </select>
                        </div>
                        <div class="form-check text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
