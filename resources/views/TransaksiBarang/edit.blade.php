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
            <form action="/transaksi/{{ $TransaksiBarang->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="number" class="form-control" name="transaksi_pembelian_id" id="transaksi_pembelian_id"
                        value="{{ $TransaksiBarang->id }}" placeholder="Masukkan Transaksi Pembelian ID" hidden>
                    <label for="exampleFormControlSelect1">Nama Barang</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="master_barang_id">
                        <option selected>-- Pilih Menu Barang --</option>
                        @foreach ($barang as $item)
                        @if ($item->id === $TransaksiBarang->master_barang_id )
                        <option value="{{ $item->id }}" selected>{{ $item->nama_barang }} / {{ $item->harga_satuan }}</option>
                        @else
                        <option value="{{ $item->id }}">{{ $item->nama_barang }} / {{ $item->harga_satuan }}</option>
                        @endif
                        @endforeach
                        @error('master_barang_id')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Harga Satuan"
                        value="{{ $TransaksiBarang->jumlah }}">
                    @error('jumlah')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan</label>
                    <input type="number" class="form-control" name="harga_satuan" id="harga_satuan"
                        placeholder="Masukkan Harga Satuan" value="{{ $TransaksiBarang->harga_satuan }}">
                    @error('harga_satuan')
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
