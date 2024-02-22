@extends("layouts.master")
@section('title')
Halaman Utama
@endsection
@section('judul')
Halaman Utama
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Welcome</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            Halo {{ Auth::user()->name }} !<br>
            Kamu Adalah Seorang {{ Auth::user()->role }}<br>
            <h4>Selamat datang di halaman utama. </h4>
        </div>
    </div>
</div>

@endsection
