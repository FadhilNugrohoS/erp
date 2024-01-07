		
@extends('Layout.index')
@section('content')
	
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
@include('Layout.sidebar')
@include('sweetalert::alert')


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Rekap Pembelian Customer</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Rekap Pembelian Customer</h1>
			</div>
		</div><!--/.row-->
        <a href="/cetak_pdf" class="btn btn-danger" target="_blank">CETAK PDF <i class="fa fa-print" aria-hidden="true"></i></a>
        <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Pesanan</th>
                <th colspan="4">Data Pemesan</th>
                <th colspan="3">Data Produk</th>
				<th rowspan="2">Jumlah Pesanan</th>
				<th rowspan="2">Total Harga</th>
				<th rowspan="2">Tanggal Pesan</th>
				<th rowspan="2">Tempo</th>
				<th rowspan="2">Status</th>
              </tr>
			  <tr>
                <th >Nama Customer</th>
                <th >Kontak Customer</th>
                <th >Alamat Customer</th>
                <th >Email Customer</th>
                <th >Nama Produk</th>
                <th >Size</th>
				<th >Harga</th>
			  </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice )
                <tr style="text-align: center">
                    <td>{{$invoice->id}}</td>
                    <td>{!! DNS1D::getBarcodeHtml($invoice->kode_pesan,'C39', 0.5,25) !!}
							<p style="font-size: 10px; margin-top: 5px">
							{{$invoice->kode_pesan}}</p>
					</td>
                    <td>{{$invoice->nama_customer}}</td>
					<td>{{$invoice->nomor_customer}}</td>
                    <td>{{$invoice->alamat_customer}}</td>
                    <td>{{$invoice->email_customer}}</td>
                    <td>{{$invoice->nama_produk}}</td>
                    <td>{{$invoice->size}}</td>
                    <td>Rp. @idr($invoice->harga)</td>
                    <td>{{$invoice->jumlah}}</td>
                    <td>Rp. @idr($invoice->total)</td>
					<td>
						{{$invoice->tanggal}}
					</td>
                    <td>
                        @if ($invoice->jatuh_tempo == 0)
                            <a href="{{ route('invoice.edit', $invoice->id) }}"class="btn btn-sm btn-info"><i class="fa fa-thumbs-o-up"></i>Register Payment</a>
                        @else
                            {{$invoice->jatuh_tempo}}
                        @endif
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
        
        <div class="d-flex justify-content-center">
            {!! $invoices->links() !!}
        </div>
    </ul>

@endsection