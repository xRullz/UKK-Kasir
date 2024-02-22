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
            <form action="/transaksi" method="POST">
                @csrf
                {{-- <div class="form-group">
                    <label for="exampleFormControlSelect1">Nomer Transaksi Barang</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="transaksi_pembelian_id">
                        <option> Pilih ID Transaksi atau Tambah Transaksi</option>
                        <option value="0" class="font-weight-bold"> Pilih ID Transaksi atau Tambah Transaksi</option>
                        @foreach ($Transaksi as $item)
                            <option class="font-weight-bold" value="{{ $item->id }}">
                                {{ $item->id }}</option>
                        @endforeach
                    </select>
                </div> --}}
                {{-- Form Barang --}}
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Barang</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="master_barang_id">
                        <option>-- Pilih Barang --</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->id }}" class="font-weight-bold">
                                {{ $item->nama_barang }}/{{ $item->harga_satuan }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Kuantitas --}}
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah"
                        placeholder="Masukkan Jumlah Data Yang Dibeli">
                    @error('jumlah')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                 {{-- Harga Satuan--}}
                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan</label>
                    <input type="number" class="form-control" name="harga_satuan" id="harga_satuan"
                        placeholder="Masukkan Harga Satuan">
                    @error('harga_satuan')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
@endsection
