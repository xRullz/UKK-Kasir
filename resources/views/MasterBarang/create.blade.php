@extends("layouts.master")
@section('title')
    Halaman Create Barang
@endsection
@section('nama')
    Toko Subandi
@endsection
@section('judul')
    Halaman Create Barang
@endsection
@section('content')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Barang</h6>
            </div>
            <div class="card-body">
                <form action="/barang" method="POST">
                    @csrf
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukan Nama Barang">
                    </div>
                    <div class="form-group">
                      <label>Stok Barang</label>
                      <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukan Stok Barang">
                    </div>
                    <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Masukan Harga Barang">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
@endsection

