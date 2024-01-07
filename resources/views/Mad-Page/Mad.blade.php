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
				<li class="active">Mark As Done</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Mark As Done</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="container">

		</div>

		<table class="table table-bordered table-striped table-hover table-responsive">
			<thead>
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Kode Pesanan</th>
					<th colspan="3">Data Pemesan</th>
					<th colspan="3">Data Produk</th>
					<th rowspan="2">Jumlah Pesanan</th>
					<th colspan="3">Data Bahan Baku</th>
					<th rowspan="2">Total Harga</th>
					<th rowspan="2">Status</th>
					<th rowspan="2">Tanggal Pesan</th>
					<th rowspan="2">Hasil Jadi</th>
				</tr>
				<tr>
					<th>Nama Pemesan</th>
					<th>Kontak Pemesan</th>
					<th>Alamat Pemesan</th>
					<th>Nama Produk</th>
					<th>Size</th>
					<th>Harga</th>
					<th>Kain</th>
					<th>Benang</th>
					<th>Dakron</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($mads as $mad )
				<tr style="text-align: center">
					<td>{{$mad->id}}</td>
					<td>{!! DNS1D::getBarcodeHtml($mad->kode_pesanan,'C39', 0.5,25) !!}
						<p style="font-size: 10px; margin-top: 5px">
							{{$mad->kode_pesanan}}</p>
					</td>
					<td>{{$mad->nama_pemesan}}</td>
					<td>{{$mad->kontak_pemesan}}</td>
					<td>{{$mad->alamat_pemesan}}</td>
					<td>{{$mad->nama_produk}}</td>
					<td>{{$mad->size}}</td>
					<td>Rp.@idr($mad->harga)</td>
					<td>{{$mad->jumlah}} <small>Pcs</small></td>
					<td>{{$mad->kain}} <small>m</small></td>
					<td>{{$mad->benang}} <small>m</small></td>
					<td>{{$mad->dakron}} <small>g</small></td>
					<td>Rp. @idr($mad->total)</td>
					<td>
						@if ($mad->status == 1)
						<span class="badge bg-success">Sudah Diproses</span>
						@endif
					</td>
					<td>{{$mad->tanggal}}</td>
					<td>{{$mad->estimasi}}</td>
				</tr>
				@endforeach
			</tbody>
			@endsection