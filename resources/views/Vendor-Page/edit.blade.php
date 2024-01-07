		
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
				<li class="active">Edit Data Vendor</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Data Vendor</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('datavendor.update',$vendors->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <h4 class="card-header">Edit Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-12 no-padding">
                            <div style="margin-left: 1rem">
                                <div class="col-md-6">
                                    <label>Kode Vendor</label>
                                    <input class="form-control" type="text" name="kode_vendor" value="{{$vendors->kode_vendor}}" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Vendor</label>
                                    <input class="form-control" type="text" name="nama_vendor" value="{{$vendors->nama_vendor}}" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Jenis Vendor</label>
                                    <input class="form-control" type="text" name="jenis_vendor" value="{{$vendors->jenis_vendor}}" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Email Vendor</label>
                                    <input class="form-control" type="text" name="email_vendor" value="{{$vendors->email_vendor}}"placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Telpon Vendor</label>
                                    <input class="form-control" type="text" name="telpon_vendor" value="{{$vendors->telpon_vendor}}" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Bahan Baku</label>
                                    <input class="form-control" type="text" name="bahan_baku" value="{{$vendors->bahan_baku}}" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Harga</label>
                                    <input class="form-control" type="text" name="harga" value="{{$vendors->harga}}" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Rekening Vendor</label>
                                    <input class="form-control" type="text" name="rekening_vendor" value="{{$vendors->rekening_vendor}}" placeholder="" required>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <div class="button-wrapper">
                                        <label for="inputImage" class="">
                                            <span class="d-none d-sm-block required-field">Upload new foto</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" name="foto" id="inputImage"
                                                class="form-control @error('foto') is-invalid @enderror" value="{{$vendors->foto}}" required>
                                        </label>
                                        <p class="text-muted mt-1">Allowed JPG, JPEG, GIF or PNG. Max size of 2MB</p>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <button type="submit" class="btn btn-info" style="margin-left: 1.5rem">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection