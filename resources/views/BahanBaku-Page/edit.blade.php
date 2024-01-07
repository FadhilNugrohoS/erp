		
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
				<li class="active">Edit Bahan Baku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Bahan Baku</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('bahanbaku.update',$bahanbaku->id)}}" method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('PUT')
            <div class="card">
                <h4 class="card-header">Tambah Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-12 no-padding">
                            <div style="margin-left: 1rem">
                                <div class="col-md-6">
                                    <label>Kode Produk</label>
                                    <input class="form-control" type="text" name="id_produk" value="{{$bahanbaku->id_produk}}" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Bahan Baku</label>
                                    <input class="form-control" type="text" name="nama_bahan_baku" value="{{$bahanbaku->nama_bahan_baku}}" placeholder="" required>
                                </div>

                                <div class="col-md-6">
                                    <label>Berat</label>
                                    <input class="form-control" type="text" name="berat_satuan" value="{{$bahanbaku->berat_satuan}}" placeholder="" required>
                                </div>

                                <div class="col-md-6">
                                    <label>Harga</label>
                                    <input class="form-control" type="text" name="harga" value="{{$bahanbaku->harga}}" placeholder="" required>
                                </div>

                                <div class="col-md-6">
                                    <label>Vendor</label>
                                    <input class="form-control" type="text" name="vendor" value="{{$bahanbaku->vendor}}" placeholder="" required>
                                </div>

                                <div class="col-md-6">
                                    <label>Deskripsi Bahan Baku</label>
                                    <input class="form-control" type="text" name="deskripsi_bahan_baku" value="{{$bahanbaku->deskripsi_bahan_baku}}"placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Stok</label>
                                    <input class="form-control" type="text" name="stok" value="{{$bahanbaku->stok}}"placeholder="" required>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <div class="button-wrapper">
                                        <label for="inputImage" class="">
                                            <span class="d-none d-sm-block required-field">Upload new foto</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" name="foto" id="inputImage"
                                                class="form-control @error('foto') is-invalid @enderror" value="{{$bahanbaku->foto}}" required>
                                        </label>
                                        <p class="text-muted mt-1">Allowed JPG, JPEG, GIF or PNG. Max size of 2MB</p>
                                    </div>
                                </div>
                                <br>
                                
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