@extends("layouts.master")
@section('title')
    Halaman Edit Barang
@endsection
@section('nama')
    Toko Subandi
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
            <h2>Edit Barang ID : {{$barang->id}}</h2>
                <form action="/barang/{{ $barang->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="{{ $barang->nama_barang }}" id="nama_barang"
                            placeholder="Masukkan Title">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok_barang">Stok Barang</label>
                        <input type="text" class="form-control" name="stok" value="{{ $barang->stok }}" id="stok"
                            placeholder="Masukkan Body">
                        @error('body')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input type="text" class="form-control" name="harga_satuan" value="{{ $barang->harga_satuan }}" id="harga_satuan"
                            placeholder="Masukkan Body">
                        @error('body')
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
