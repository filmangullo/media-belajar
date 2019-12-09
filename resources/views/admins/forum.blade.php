@extends('layouts.adm')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Forum Kelas {{ $kelasMataPelajarans->nama }} pada Instansi {{ $kelasMataPelajarans->instansis['nama'] }}</h1>
    <p class="mb-4">Data Ini bertujuan untuk melihat berapa banyak Pertemuan Forum Kelas yang online yang dibuka pada kelas {{ $kelasMataPelajarans->nama }}.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10">
                            <h6 class="m-0 font-weight-bold text-primary">Data Forum / Pertemuan pada kelas</h6>
                    </div>
                    <div class="col-md-2">
                            <a href="{{ route('adm.forum.create', $kelasMataPelajarans->id) }}" type="button" class="btn btn-success btn-sm btn-block">Forum</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Enroll Key</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Enroll Key</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{-- @foreach ($kelasMataPelajarans as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><a href="{{ route('adm.forum.index', $item->id) }}">{{ $item->nama }}</a></td>
                                <td>{!! str_limit ($item->keterangan, 30, ' ...') !!}</td>
                                <td>{{ $item->enroll_key}}</td>
                                <td>2011/01/25</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<!-- Page level custom scripts -->
<script src="{{ URL::asset('admins/js/demo/datatables-demo.js') }}"></script>
@endsection
