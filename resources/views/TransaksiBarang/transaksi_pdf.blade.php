<!DOCTYPE html>
<html>
<head>
	<title>Laporan Transaksi</title>
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
		<h4>Laporan Data Transaksi</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Total Harga</th>
                <th>Waktu Dibuat</th>
                <th>Waktu Diperbarui</th>
            </tr>
		</thead>
		<tbody>
			@foreach($transaksi as $item => $key)
            <tr>
                <td>{{ $item + 1 }}</td>
                <td>{{ $key->id }}</td>
                <td>{{ $key->total_harga }}</td>
                <td>{{ $key->created_at }}</td>
                <td>{{ $key->updated_at }}</td>
            </tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
