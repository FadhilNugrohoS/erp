
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
            /* border: 1px solid black; */
		}
	</style>
	<center>
		<h5>Laporan Penjualan</h4>
	</center> 
	<table class='table table-bordered'>
		<thead>
            <tr style="text-align: center">
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Pesanan</th>
                <th colspan="1">Data Pemesan</th>
                <th colspan="3">Data Produk</th>
				<th rowspan="2">Jumlah Pesanan</th>
				<th rowspan="2">Total Harga</th>
				<th rowspan="2">Tanggal Pesan</th>
				<th rowspan="2">Status</th>
            </tr>
			<tr style="text-align: center">
                <th >Nama Customer</th>
                <th >Nama Produk</th>
                <th >Size</th>
				<th >Harga</th>
			</tr>
		</thead>
		<tbody>
        @foreach ($invoices as $invoice )
                <tr style="text-align: center">
                    <td>{{$invoice->id}}</td>
                    <td>{{$invoice->kode_pesan}}</td>
                    <td>{{$invoice->nama_customer}}</td>
                    <td>{{$invoice->nama_produk}}</td>
                    <td>{{$invoice->size}}</td>
                    <td>Rp. @idr($invoice->harga)</td>
                    <td>{{$invoice->jumlah}}</td>
                    <td>Rp. @idr($invoice->total)</td>
					<td>
						{{$invoice->tanggal}}
					</td>
                    <td>
                        @if ($invoice->status == 0)
                            <a href="{{ route('invoice.paid', $invoice->id) }}"class="btn btn-sm btn-danger"><i class="fa fa-times"></i>Paid</a>
                        @elseif ($invoice->status >0)
                            <button class ="btn btn-sm btn-success" disabled>Paid <i class="fa fa-thumbs-o-up"></i></button>
                        @endif
                    </td>
                </tr>
                @endforeach
		</tbody>
	</table>
    <div style='text-align:right'>Total Penjualan : Rp. @idr($total)</div>
    
    <!-- Total penjualan -->
 
</body>
</html>