		
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
				<li class="active">Data RFQ</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data RFQ</h1>
			</div>
		</div><!--/.row-->
		
		{{-- <div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large">120</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">24</div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div> --}}
        <table class="table table-bordered table-striped table-hover">
            <thead>
				{{-- <a type="button" class="btn btn-primary btn-lg" href="{{ route ('rfq.create') }}">+</a> --}}
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Rfq</th>
                <th colspan="3">Data Vendor</th>
                <th colspan="3">Data Bahan Baku</th>
                <th rowspan="2">Quantity</th>
                <th rowspan="2">Total Harga</th>
                <th rowspan="2">Tanggal Pemesanan</th>
				<th colspan="3">Status</th>
              </tr>
              <tr>
                <th>Nama Vendor</th>
                <th>Email </th>
                <th>Kontak </th>
                <th>Nama Bahan Baku </th>
                <th>Harga Bahan Baku </th>
                <th>Status </th>
                <th>Tanggal Konfirmasi Vendor </th>
                <th>Tanggal Pembayaran </th>
              </tr>
            </thead>
			<!-- Batas belum dikerjakan -->
            <tbody class="text-center">
                @foreach ($rfqs as $r)
                <tr>
                    <td>{{$r->id}}</td>
                    <td>{!! DNS1D::getBarcodeHTML($r->kode_rfq, 'C39', 0.8, 30) !!}
                        <p style="font-size: 10px; margin-top: 5px;">
                            {{ $r->kode_rfq }}</p></td>
                    <td>{{$r->nama_vendor}}</td>
                    <td>{{$r->email_vendor}}</td>
                    <td>{{$r->telpon_vendor}}</td>
                    <td>{{$r->bahan_baku}}</td>
                    <td>Rp.@idr($r->harga)</td>
                    
                    @if ($r->status == 1)
                         <td><span class="badge bg-danger">RFQ</span></td>
                     @elseif ($r->status == 2)
                         <td><span class="badge bg-warning">Purchase Order</span></td>
                     @elseif ($r->status == 3)
                         <td><span class="badge bg-gray-900">Nothing To Bill</span></td>
                     @elseif ($r->status == 4)
                         <td><span class="badge bg-success">Fully Billed</span></td>
                    @endif

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
		<script></script>
@endsection