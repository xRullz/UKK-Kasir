@extends("layouts.master")
@push('style')

    <!-- Custom styles for this page -->
    <link href="{{ asset('sb_admin_2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('title')
    Halaman Transaksi Barang
@endsection
@section('nama')
    Kasir Toko Subandi
@endsection
@section('judul')
    Halaman Transaksi Barang
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Barang</h6>
            </div>
            <div class="card-body">
                <a href="/transaksi/create" class="btn btn-primary">Tambah +</a>
                <a href="/transaksi/transaksi_pdf" class="btn btn-primary" target="_blank">Cetak PDF</a>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Total Harga Transaksi</th>
                                <th>Waktu Dibuat</th>
                                <th>Waktu Diupdate</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($Transaksi as $item => $key)
                                <tr>
                                    <td>{{ $item + 1 }}</td>
                                    <td>{{ $key->id }}</td>
                                    <td>{{ $key->total_harga }}</td>
                                    <td>{{ $key->created_at }}</td>
                                    <td>{{ $key->updated_at }}</td>
                                    <td class="text-center">
                                    <a href="transaksi/{{$key->id}}" class="btn btn-info">Cek Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('sb_admin_2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('sb_admin_2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb_admin_2') }}/js/demo/datatables-demo.js"></script>
@endpush
