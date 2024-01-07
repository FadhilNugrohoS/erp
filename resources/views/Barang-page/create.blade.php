		
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
				<li class="active">Tambah Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Barang</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h4 class="card-header">Tambah Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-12 no-padding">
                            <div style="margin-left: 1rem">
                                <div class="col-md-6">
                                    <label>Kode Produk</label>
                                    <input class="form-control" type="text" name="kode_produk" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Produk</label>
                                    <input class="form-control" type="text" name="nama_produk" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Ukuran Panjang <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="ukuran_panjang" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Ukuran Lebar  <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="ukuran_lebar" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Harga</label>
                                    <input class="form-control" type="text" name="harga" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Berat</label>
                                    <input class="form-control" type="text" name="berat" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Size</label>
                                    <select class="form-control" type="text" name="size" placeholder="" required>
                                        <option disable selected>-- Pilih Size --</option>
                                        <option value="S">Small</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Large</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <label for="floatingTextarea">Deskripsi Produk <span class="text-muted" style="color: #fe4654; font-weight:normal" > *isi data sesuai dengan barang</span></label>
                                        <textarea class="form-control" placeholder="" id="floatingTextarea" name="deskripsi_produk" required></textarea>
                                    </div>
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