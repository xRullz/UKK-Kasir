@extends("layouts.master")
@section('title')
    Halaman Edit Barang
@endsection
@section('nama')
    Faisal Dzulfikar
@endsection
@section('judul')
    Halaman Edit Barang
@endsection
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
        </div>
        <div class="card-body">
            <h2>Edit User ID : {{$CrudUser->id}}</h2>
                <form action="/CrudUser/{{ $CrudUser->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text" class="form-control" name="name" value="{{ $CrudUser->name }}" id="name"
                            placeholder="Masukkan Nama">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Email :</label>
                        <input type="text" class="form-control" name="email" value="{{ $CrudUser->email }}" id="email"
                            placeholder="Masukkan email">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Password :</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan Password">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
        </div>
    </div>
@endsection
