@extends("layouts.master")
@section('title')
    Halaman Create User
@endsection
@section('nama')
    Faisal Dzulfikar
@endsection
@section('judul')
    Halaman Create User
@endsection
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
        </div>
        <div class="card-body">
            <form action="/CrudUser" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="admin">Admin</option>
                        <option value="kasir">kasir</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@endsection
