		
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
				<li class="active">Data Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Barang</h1>
			</div>
		</div><!--/.row-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <a type="button" class="btn btn-primary btn-lg" href="{{ route ('barang.create') }} ">+</a>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Produk</th>
                <th rowspan="2">Nama Produk</th>
                <th colspan="2">Ukuran</th>
                <th rowspan="2">Harga</th>
                <th rowspan="2">Berat</th>
                <th rowspan="2">Size</th>
                <th rowspan="2">Deskripsi</th>
                <th rowspan="2">Stok</th>
                <th rowspan="2">Penjualan</th>
                <th rowspan="2">Foto</th>
				<th rowspan="2">Action</th>
              </tr>
			  <tr>
				<th>Ukuran Panjang</th>
				<th>Ukuran Lebar</th>
			  </tr>
            </thead>
            <tbody>
                @foreach ($barang as $barang )
                <tr style="text-align: center">
                    <td>{{$barang->id}}</td>
                    <td>{{$barang->kode_produk}}</td>
                    <td>{{$barang->nama_produk}}</td>
                    <td>{{$barang->ukuran_panjang}} <small>cm</small></td>
                    <td>{{$barang->ukuran_lebar}} <small>cm</small></td>
                    <td>Rp. @idr ($barang->harga)</td>
                    <td>{{$barang->berat}} <small>gram</small></td>
                    <td>{{$barang->size}}</td>
                    <td>{{$barang->deskripsi_produk}}</td>
					<td>
						@if ($barang->stok == 0)
							<span class="badge bg-danger">Belum Tersedia</span>
						@else
							{{$barang->stok}}
						@endif
					</td>
                    <td>
						@if ($barang->penjualan == 0)
							<span class="badge bg-danger">Belum Tersedia</span>
						@else
							{{$barang->penjualan}}
						@endif
					</td>
                    <td>
						<img width="50" height="50"
						src="{{ Storage::url('public/posts/') . $barang->foto }}">
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                            <a href="{{ route('barang.edit', $barang->id) }}"
                                class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
@endsection