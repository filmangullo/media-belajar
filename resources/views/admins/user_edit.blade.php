@extends('layouts.adm')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Edit</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('adm.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Role</label>
                            <select name="role" class="form-control">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : "" }}>User</option>
                                <option value="pengajar" {{ $user->role == 'pengajar' ? 'selected' : "" }}>Pengajar</option>
                                <option value="pelajar" {{ $user->role == 'pelajar' ? 'selected' : "" }}>Pelajar</option>
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
