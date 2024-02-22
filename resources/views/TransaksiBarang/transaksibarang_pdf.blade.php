<!DOCTYPE html>
<html>
<head>
	<title>Laporan Transaksi Barang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h4>Laporan Data Transaksi Barang</h4>
            <h5>ID Transaksi : {{$Transaksi->id}}</h5>
	</center>

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
            </tr>
        </thead>
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
                </tr>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>Total Transaksi</td>
                <td colspan="7" align="center">{{ $Transaksi->total_harga }}</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
