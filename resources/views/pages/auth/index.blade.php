@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
        </div>
        <div class="card-body">
            <form action="/users/admin/add" method="POST">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control mb-2" required>
                        <label for="Role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="1">Admin</option>
                            <option value="2">Ketua</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control mb-2" required>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control mb-2" required>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>

                </div>


            </form>
        </div>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($users as $p)
                       <tr class="text-center">
                        <form action="/dashboard/admin/update/{{ $p->id }}" method="POST">
                            @csrf
                            <td><input type="text" value="{{ $p->nama }}" name="nama" class="form-control"></td>
                            <td><input type="text" value="{{ $p->email }}" name="email" class="form-control"></td>

                            <td><input type="text" name="password" class="form-control"></td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </td>
                                <td>
                                    <a onclick="return confirm('Yakin Ingin Menghapus Data ini?')" href="/delete/admin/{{ $p->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </form>
                        </tr>

                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- /.container-fluid -->
@endsection
