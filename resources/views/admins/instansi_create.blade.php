@extends('layouts.adm')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Instansi Baru</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('adm.instansi.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Instansi</label>
                            <input type="text" name="nama" class="form-control" placeholder="Input Nama Instansi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Input Alamat Instansi">
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
