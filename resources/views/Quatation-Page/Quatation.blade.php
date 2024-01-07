		
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
				<li class="active">Quatation</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quatation</h1>
			</div>
		</div><!--/.row-->

        <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Pesanan</th>
                <th colspan="4">Data Pemesan</th>
                <th colspan="3">Data Produk</th>
				<th rowspan="2">Jumlah Pesanan</th>
				<th rowspan="2">Total Harga</th>
				<th rowspan="2">Status</th>
				<th rowspan="2">Tanggal Pesan</th>
				<th rowspan="2">Aksi</th>
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
                @foreach ($quatations as $quatation )
                <tr style="text-align: center">
                    <td>{{$quatation->id}}</td>
                    <td>{!! DNS1D::getBarcodeHtml($quatation->kode_pesan,'C39', 0.5,25) !!}
							<p style="font-size: 10px; margin-top: 5px">
							{{$quatation->kode_pesan}}</p>
					</td>
                    <td>{{$quatation->nama_customer}}</td>
					<td>{{$quatation->nomor_customer}}</td>
                    <td>{{$quatation->alamat_customer}}</td>
                    <td>{{$quatation->email_customer}}</td>
                    <td>{{$quatation->nama_produk}}</td>
                    <td>{{$quatation->size}}</td>
                    <td>{{$quatation->harga}}</td>
                    <td>{{$quatation->jumlah}}</td>
                    <td>Rp. @idr($quatation->total)</td>
                    <td>
						@if ($quatation->status == 0)
							 Quotation
						@else
							Pesanan Penjualan
						@endif
					</td>
					<td>
						{{$quatation->tanggal}}
					</td>
                    <td>
                        @if ($quatation->status == 0)
                           <a href="{{ route('quatation.proses', $quatation->id) }}"class="btn btn-sm btn-danger"><i class="fa fa-times"></i>Konfirmasi</a>
                        @elseif($quatation->status > 0)
                            <button class ="btn btn-sm btn-success" disabled>Terkonfirmasi <i class="fa fa-thumbs-o-up"></i></button>
                        @endif
                    </td>
                    {{-- <td>
					<form action="{{ route('quatation.proses', $quatation->id) }}" method="POST">
						@csrf
                            <button type="submit" class="btn btn-sm btn-danger">Proses</button>                            
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
@endsection