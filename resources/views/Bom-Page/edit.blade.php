		
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
				<li class="active">Tambah BOM</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah BOM</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('bom.update',$bom->id)}}" method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('PUT')
            <div class="card">
                <h4 class="card-header">Edit Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-12 no-padding">
                            <div style="margin-left: 1rem">
                                <div class="col-md-6">
                                    <label>Kode Produk</label>
                                    <input class="form-control" type="text" name="kode" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Produk</label>
                                    <input class="form-control" type="text" name="nama" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Kain <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="kain" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Benang  <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="benang" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>size  <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="size" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Dakron</label>
                                    <input class="form-control" type="text" name="dakron" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Estimasi</label>
                                    <input class="form-control" type="text" name="estimasi" placeholder="" required>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-info" style="margin-left: 1.5rem">Simpan Data</button>
                    </div>
                </div>
            </div>
        </form>
@endsection