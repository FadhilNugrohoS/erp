		
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
				<li class="active">Edit Pemesanan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Pemesanan</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('pemesanan.update',$pemesanan->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <h4 class="card-header">Edit Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-6 no-padding">
                            <div style="margin-left: 1rem">
                                <td>
                                    <label>Nama Pemesan</label>
                                    <input class="form-control" type="text" name="nama_pembeli" value="{{$pemesanan->nama_pembeli}}" placeholder="" required>
                                </td>
                                <td>
                                    <label>Kontak Pembeli</label>
                                    <input class="form-control" type="text" name="kontak_pembeli" value="{{$pemesanan->kontak_pembeli}}" placeholder="" required>
                                </td>
                                </td>
                                <td>
                                    <label>Alamat Pembeli</label>
                                    <input class="form-control" type="text" name="alamat_pembeli" value="{{$pemesanan->alamat_pembeli}}" placeholder="" required>
                                </td>
                                </td>
                                <td>
                                    <label>Kode Produk</label>
                                    <input class="form-control" type="text" name="kode_produk" value="{{$pemesanan->kode_produk}}"placeholder="" required>
                                </td>
                                </td>
                                <td>
                                    <label>Jumlah Pesanan</label>
                                    <input class="form-control" type="text" name="jumlah_pesanan" value="{{$pemesanan->jumlah_pesanan}}" placeholder="" required>
                                </td>
                                </td>
                                <td>
                                    <label>Total Harga</label>
                                    <input class="form-control" type="text" name="total_harga" value="{{$pemesanan->total_harga}}" placeholder="" required>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-info" style="margin-left: 1.5rem">Simpan Data</button>
                                </td>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection