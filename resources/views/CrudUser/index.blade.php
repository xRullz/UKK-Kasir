@extends("layouts.master")
@push('style')

    <!-- Custom styles for this page -->
    <link href="{{ asset('sb_admin_2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('title')
    Halaman Master Barang
@endsection
@section('nama')
    Faisal Dzulfikar
@endsection
@section('judul')
    Halaman Master Barang
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Barang</h6>
            </div>
            <div class="card-body">
                <a href="CrudUser/create">Tambah +</a>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Dibikin</th>
                                <th>Diperbarui</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Dibikin</th>
                                <th>Diperbarui</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $item => $key)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td>{{ $key->name }}</td>
                                <td>{{ $key->role }}</td>
                                <td>{{ $key->email }}</td>
                                <td>{{ $key->created_at }}</td>
                                <td>{{ $key->updated_at }}</td>
                                <td>
                                    <a href="CrudUser/{{ $key->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="CrudUser/{{ $key->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
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
