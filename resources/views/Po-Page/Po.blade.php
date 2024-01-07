		
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
				<li class="active">Data PO</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data PO</h1>
			</div>
		</div><!--/.row-->
		
        <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Rfq</th>
                <th colspan="3">Data Vendor</th>
                <th colspan="2">Data Bahan Baku</th>
                <th rowspan="2">Quantity</th>
                <th rowspan="2">Total Harga</th>
                <th rowspan="2">Tanggal Pemesanan</th>
                <th rowspan="2">Tanggal Pembayaran</th>
                <th colspan="3">Action</th>
              </tr>
              <tr>
                <th>Nama Vendor</th>
                <th>Email </th>
                <th>Kontak </th>
                <th>Nama Bahan Baku </th>
                <th>Harga Bahan Baku </th>
                <th>Receive Product</th>
                <th>Validate</th>
                <th>Paid</th>
              </tr>
            </thead>
			<!-- Batas belum dikerjakan -->
            <tbody class="text-center">
                @foreach ($pos as $po)
                <tr>
                    <td>{{$po->id}}</td>
                    <td>{!! DNS1D::getBarcodeHTML($po->kode_rfq, 'C39', 0.8, 30) !!}
                        <p style="font-size: 10px; margin-top: 5px;">
                            {{ $po->kode_rfq }}</p></td>
                    <td>{{$po->nama_vendor}}</td>
                    <td>{{$po->email_vendor}}</td>
                    <td>{{$po->telpon_vendor}}</td>
                    <td>{{$po->bahan_baku}}</td>
                    <td>Rp.@idr($po->harga)</td>
                    
                    @if ($po->status == 1)
                         <td><span class="badge bg-danger">RFQ</span></td>
                     @elseif ($po->status == 2)
                         <td><span class="badge bg-warning">Purchase Order</span></td>
                     @elseif ($po->status == 3)
                         <td><span class="badge bg-gray-900">Nothing To Bill</span></td>
                     @elseif ($po->status == 4)
                         <td><span class="badge bg-success">Fully Billed</span></td>
                    @endif

					@if ($po->bahan_baku == 'Kain')
                        <td>
                            {{$po->quantity}} <small>meter</small>
                        </td>
					@elseif ($po->bahan_baku == 'Benang')
                        <td>
                            {{$po->quantity}} <small>roll</small>
                        </td>
                    @elseif ($po->bahan_baku == 'Dakron')
                        <td>
                            {{$po->quantity}} <small>gram</small>
                        </td>
					@endif

                    <td>Rp.@idr($po->total)</td>
                    <td>{{$po->tanggal_pesan}}</td>
                    <td>{{$po->tanggal_pembayaran}}</td>

                    {{-- Button Receive Product --}}
                    @if ($po->receive == 1)
                    <td>
                        <button class="btn btn-primary" disabled><i class="fa fa-thumbs-o-up"></i>
                            Receive Product</button>
                    </td>
                    @elseif($po->receive == 0)
                    <td>
                        <a href="{{ route('po.receive', $po->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Receive Product</a>
                    </td>
                    @endif

                    {{-- Button Validate --}}
                    @if ($po->validate == 1)
                    <td>
                        <button class="btn btn-danger" disabled><i class="fa fa-times"></i>
                            Validate</button>
                    </td>
                    @elseif ($po->validate == 2)
                    <td>
                        <a href="{{ route('po.show', $po->id) }}" class="btn btn-danger"><i class="fa fa-times"></i> Validate</a>
                    </td>
                    @elseif ($po->validate == 3)
                    <td>
                        <button class="btn btn-success" disabled><i class="fa fa-check"></i>
                            Validate</button>
                    </td>
                    @endif
                    {{-- Button Paid --}}
                    @if ($po->paid == 1)
                    <td>
                        <button class="btn btn-danger" disabled><i class="fa fa-times"></i>
                            Unpaid</button>
                    </td>
                    @elseif ($po->paid == 2)
                    <td>
                        <a href="{{ route('po.edit', $po->id) }}" class="btn btn-warning"><i class="fa fa-times"></i> Unpaid</a>
                    </td>
                    @elseif ($po->paid == 3)
                    <td>
                        <button class="btn btn-info" disabled><i class="fa fa-money"></i>
                            Paid</button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
		</table>
		<script></script>
@endsection