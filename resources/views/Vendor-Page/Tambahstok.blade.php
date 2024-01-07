		
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
				<li class="active">Tambah data stok</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah data stok</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('datavendor.stok',$bahan->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h4 class="card-header">{{$bahan->nama_bahan_baku}}</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-12 no-padding">
                            <div style="margin-left: 1rem">
                                <div class="col-md-6">
                                    @if($bahan->nama_bahan_baku == 'Kain')
                                        <label for='kode'>Stok{{$bahan->nama_bahan_baku}}</label>
                                    @elseif($bahan->nama_bahan_baku == 'Benang')
                                        <label for='kode'>Stok{{$bahan->nama_bahan_baku}}</label>
                                    @elseif($bahan->nama_bahan_baku == 'Dakron')
                                        <label for='kode'>Stok{{$bahan->nama_bahan_baku}}</label>
                                    @endif
                                    <input class="form-control" type="text" id="#" name="stok">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info" style="margin-left: 1.5rem">Simpan Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection