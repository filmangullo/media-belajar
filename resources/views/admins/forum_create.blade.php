@extends('layouts.adm')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelas Mata Pelajaran </h1>
    <p class="mb-4">Data Ini bertujuan untuk Data Kelas yang online yang dibuka pada instansi {{ $kelasMataPelajarans->nama }}.
    </p>
    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nama Forum / Pertemuan Baru</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('adm.forum.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="kelas_mata_pelajarans_id" value="{{ $kelasMataPelajarans->id }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Forum / Pertemuan Ke ?</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Forum / Pertemuan Ke ?" required>
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
