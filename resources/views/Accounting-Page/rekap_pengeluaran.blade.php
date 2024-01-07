<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pengeluaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 7pt;
            border: 1px solid black;
		}
        th, td{
            padding: 5px;
        }
        
	</style>
	<center>
		<h5>Laporan Pengeluaran</h4>
	</center> 
	<table style="width:100%">
        <thead>
            <tr style="text-align: center">
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Rfq</th>
                <th colspan="2">Data Vendor</th>
                <th colspan="2">Data Bahan Baku</th>
                <th rowspan="2">Quantity</th>
                <th rowspan="2">Total Harga</th>
                <th rowspan="2">Tanggal Pemesanan</th>
				<th colspan="2">Status</th>
            </tr>
            <tr style="text-align: center">
                <th>Nama Vendor</th>
                <th>Kontak </th>
                <th>Nama Bahan Baku </th>
                <th>Harga Bahan Baku </th>
                <th>Tanggal Konfirmasi Vendor </th>
                <th>Tanggal Pembayaran </th>
            </tr>
		</thead>
        <tbody class="text-center">
                @foreach ($rfqs as $r)
                <tr>
                    <td>{{$r->id}}</td>
                    <td>{{$r->kode_rfq }}</td>
                    <td>{{$r->nama_vendor}}</td>
                    <td>{{$r->telpon_vendor}}</td>
                    <td>{{$r->bahan_baku}}</td>
                    <td>Rp.@idr($r->harga)</td>

					@if ($r->bahan_baku == 'Kain')
                        <td>
                            {{$r->quantity}} <small>meter</small>
                        </td>
					@elseif ($r->bahan_baku == 'Benang')
                        <td>
                            {{$r->quantity}} <small>roll</small>
                        </td>
                    @elseif ($r->bahan_baku == 'Dakron')
                        <td>
                            {{$r->quantity}} <small>gram</small>
                        </td>
					@endif

                    <td>Rp.@idr($r->total)</td>
                    <td>{{$r->tanggal_pesan}}</td>
                    <td>
                        @if ($r->tanggal_confirm_vendor == 'Menunggu Konfirmasi')
                        <span class="badge bg-warning">{{$r->tanggal_confirm_vendor}}</span>
                        @else
                        <span class="badge bg-info">{{$r->tanggal_confirm_vendor}}</span>
                        @endif
                    </td>
                    <td>
                        @if ($r->tanggal_pembayaran == 0)
                        <span class="badge bg-gray-900">Menunggu pembayaran</span>
                        @else
                            {{$r->tanggal_pembayaran}}
                        @endif
                    </td>
                </tr>
                @endforeach
        </tbody>
	</table>
    <div style='text-align:right'>Total Penjualan : Rp. @idr($total)</div>
    
 
</body>
</html>
