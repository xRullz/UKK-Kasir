@extends("layouts.master")
@section('title')
    Halaman Show Barang
@endsection
@section('nama')
    Toko Subandi
@endsection
@section('judul')
    Halaman Show Barang
@endsection
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Show Barang</h6>
        </div>
        <div class="card-body">
            <h2>ID Barang :     {{ $barang->id }}</h2>
            <h4>Nama Barang :   {{ $barang->nama_barang }}</h4>
            <h4>Stok Barang :   {{ $barang->stok }}</h4>
            <h4>Harga Barang :  {{ $barang->harga_satuan }}</h4>
            <br>
            <h4><a href="/barang">Back</a></h4>
        </div>
    </div>
@endsection
