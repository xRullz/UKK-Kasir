@extends("layouts.master")
@section('title')
    Halaman Show Transaksi Barang
@endsection
@section('nama')
    Toko Subandi
@endsection
@section('judul')
    Halaman Show Transaksi Barang
@endsection
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Show Barang</h6>
        </div>
        <div class="card-body">
            <a href="/transaksi/transaksibarang_pdf/{{$Transaksi->id}}" class="btn btn-primary" target="_blank" >Cetak PDF</a>
            <h2 align="center">ID Transaksi {{ $Transaksi->id }}</h2>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah Barang</th>
                        <th>Jumlah Harga Barang</th>
                        <th>Waktu Dibuat</th>
                        <th>Waktu Diupdate</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>Total Transaksi</td>
                        <td colspan="7" align="center">{{ $Transaksi->total_harga }}</td>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($Transaksi->transaksi_pembelian_barang as $item => $key)
                        <tr>
                            <td>{{ $item + 1 }}</td>
                            <td>{{ $key->master_barang->nama_barang }}</td>
                            <td>{{ $key->harga_satuan }}</td>
                            <td>{{ $key->jumlah }}</td>
                            <td>{{ $key->harga_satuan * $key->jumlah }}</td>
                            <td>{{ $key->created_at }}</td>
                            <td>{{ $key->updated_at }}</td>
                            <td>
                                <a href="{{ route('transaksi.edit', $key->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('transaksi.destroy', $key->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                        </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
