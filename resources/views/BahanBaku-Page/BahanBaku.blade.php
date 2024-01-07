		
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
				<li class="active">Data Bahan Baku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Bahan Baku</h1>
			</div>
		</div><!--/.row-->
		
        <table class="table table-bordered table-striped table-hover">
            <thead>
				<a type="button" class="btn btn-primary btn-lg" href="{{ route ('bahanbaku.create') }} ">+</a>
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID Produk</th>
                <th scope="col">Nama Bahan Baku</th>
                <th scope="col">Berat Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col">Vendor</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Stok</th>
                <th scope="col">Foto</th>
				<th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($bahanbakus as $bahanbaku )
                <tr style="text-align: center">
                    <td>{{$bahanbaku->id}}</td>
                    <td>{{$bahanbaku->id_produk}}</td>
                    <td>{{$bahanbaku->nama_bahan_baku}}</td>
                    <td>{{$bahanbaku->berat_satuan}}</td>
                    <td>Rp. @idr ($bahanbaku->harga)</td>
                    <td>{{$bahanbaku->vendor}}</td>
                    <td>{{$bahanbaku->deskripsi_bahan_baku}}</td>
                    <td>
						@if ($bahanbaku->stok == 0)
							<span class="badge bg-danger">Belum Tersedia</span>
						@elseif ($bahanbaku->stok >0)
							@if($bahanbaku->nama_bahan_baku == 'Kain')
							<span class="badge bg-info" >{{$bahanbaku->stok}} <small>meter</small></span>	
						@elseif ($bahanbaku->nama_bahan_baku == 'Benang')
								<span class="badge bg-info" >{{$bahanbaku->stok}} <small>roll</small></span>
						@elseif ($bahanbaku->nama_bahan_baku == 'Dakron')
								<span class="badge bg-info" >{{$bahanbaku->stok}} <small>gram</small></span>
							@endif
						@endif
					</td>
                    <td>
                        <img width="50" height="50"
                            src="{{ Storage::url('public/posts/') . $bahanbaku->foto}}" alt="">
                    </td>
					<td>
						<a href="{{route('rfq.create',$bahanbaku->id)}}" class="btn btn-sm btn-info">Order</a>
					</td>
                </tr>
                @endforeach
            </tbody>
@endsection