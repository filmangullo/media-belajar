@extends('layouts.adm')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dasboard</h1>
    <p class="mb-4">Data Ini bertujuan untuk melihat berapa banyak Kelas yang online yang dibuka dalam setiap instansi.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10">
                            <h6 class="m-0 font-weight-bold text-primary">Data Instansi</h6>
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
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                  <button href="" onclick="document.getElementById('approve').submit();">Approve to {{$item->roleOfRequests['role_of_request']}}</button></li>
                                  <form id="approve" action="{{ route('adm.user.approve', $item->id ) }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('adm.user.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
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
