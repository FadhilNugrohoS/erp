		
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
				<li class="active">Data BOM</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data BOM</h1>
			</div>
		</div><!--/.row-->
		
		
        <table class="table table-bordered table-striped table-hover">
            <thead>
				<a type="button" class="btn btn-primary btn-lg" href="{{ route ('bom.create') }} ">+</a>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Produk</th>
                <th rowspan="2">Nama Produk</th>
                <th rowspan="2">Size</th>
                <th colspan="3">Bahan Baku</th>
                <th rowspan="2">Quantity</th>
                <th rowspan="2">Estimasi</th>
                <th rowspan="2">Action</th>
              </tr>
              <tr>
                <th>Kain/<small>meter</small></th>
                <th>Benang/<small>meter</small></th>
                <th>Dakron/<small>gram</small></th>
              </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($bom as $bm)
                <tr>
                    <td>{{$bm->id}}</td>
                    <td>{{$bm->kode}}</td>
                    <td>{{$bm->nama}}</td>
                    <td>{{$bm->size}}</td>
                    <td>{{$bm->kain}} <small>m</small></td>
                    <td>{{$bm->benang}} <small>roll</small></td>
                    <td>{{$bm->dakron}} <small>g</small></td>
                    <td>{{$bm->quantity}}</td>
                    <td>{{$bm->estimasi}} <small>menit</small></td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('bom.destroy', $bm->id) }}" method="POST">
                            <a href="{{ route('bom.edit', $bm->id) }}"
                                class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        {{-- <a href="{{ route('bom.cetak', $bm->id) }}"
                            class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
@endsection