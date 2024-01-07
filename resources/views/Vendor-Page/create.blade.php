		
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
				<li class="active">Tambah Vendor</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Vendor</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('datavendor.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h4 class="card-header">Tambah Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-12 no-padding">
                            <div style="margin-left: 1rem">
                                <div class="col-md-6">
                                    <label>Kode Vendor</label>
                                    <input class="form-control" type="text" name="kode_vendor" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Vendor</label>
                                    <input class="form-control" type="text" name="nama_vendor" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Jenis Vendor</label>
                                    <select class="form-control" type="text" name="jenis_vendor" placeholder="" required>
                                        <option disable selected>-- Pilih Jenis --</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Company">Company</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>E-Mail</label>
                                    <input class="form-control" type="text" name="email_vendor" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>No Telpon</label>
                                    <input class="form-control" type="text" name="telpon_vendor" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Harga</label>
                                    <input class="form-control" type="text" name="harga" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Bahan Baku</label>
                                    <select id="id" class="form-control" type="text" name="bahan_baku" required >
                                        <option disabled selected >-- Pilih Bahan --</option>
                                        @foreach ($bahan as $bahans)
                                            <option value="{{$bahans->nama_bahan_baku}}">
                                                {{$bahans->nama_bahan_baku}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Rekening</label>
                                    <input class="form-control" type="text" name="rekening_vendor" placeholder="" required>
                                </div>
                                <div class="col-md-2">
                                <img src="../../assets/gambar/admin.png" alt="Image" class="d-block rounded"
                                    height="75" width="auto" id="uploadedAvatar" />
                                </div>
                                    <div class="col-md-5">
                                    <div class="button-wrapper">
                                        <label for="inputImage" class="">
                                            <span class="d-none d-sm-block required-field">Upload new foto</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" name="foto" id="inputImage"
                                                class="form-control @error('foto') is-invalid @enderror" required>
                                        </label>
                                        <p class="text-muted mt-1">Allowed JPG, JPEG, GIF or PNG. Max size of 2MB</p>
                                    </div>
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
        <script>
            inputImage.onchange = evt => {
            const [file] = inputImage.files
            if (file) {
                uploadedAvatar.src = URL.createObjectURL(file)
            }
            }
        </script>
@endsection