		
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
				<li class="active">Pemesanan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pemesanan</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('pemesanan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h4 class="card-header">Tambah Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-12 no-padding">
                            <div style="margin-left: 1rem">
                                <div class="col-md-6">
                                    <label>Nama Pemesan</label>
                                    <input class="form-control" type="text" name="nama_pembeli"  placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Kontak Pemesan</label>
                                    <input class="form-control" type="text" name="kontak_pembeli" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Alamat Pemesan</label>
                                    <input class="form-control" type="text" name="alamat_pembeli"  placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Jumlah Pesanan</label>
                                    <input class="form-control" type="text" name="jumlah_pesanan" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Total Harga</label>
                                    <input class="form-control" type="text" name="total_harga"  placeholder="" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Kode Produk</label>
                                    <select class="form-control" type="text" name="kode_produk" placeholder="" required>
                                    </select>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-info" style="margin-left: 1.5rem">Simpan Data</button>
                    </div>
                </div>
                
            </div>
        </form>
@endsection