		
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
        <form action="{{route('bom.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h4 class="card-header">Tambah Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-12 no-padding">
                            <div style="margin-left: 1rem">
                                <div class="col-md-6">
                                    <label>Detail Produk</label>
                                    <select class="form-control dynamic" type="text" name="kode_produk" id="id" data-dependent="kode_produk" 
                                    placeholder="" data-dynamic1="nama_produk" data-dynamic2="size" required>
                                    <option disabled selected> -- Pilih Produk --</option>
                                    @foreach ($barangs as $barang )
                                    <option value="{{$barang->id}}">
                                        {{$barang->kode_produk}} || {{$barang->nama_produk}} || {{$barang->size}}
                                    </option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Kode Produk</label>
                                    <select class="form-control" type="text" name="kode" value="{{$barang->kode_produk}}"id="kode_produk" placeholder="" readonly>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Nama Produk</label>
                                    <select class="form-control" type="text" name="nama" value="{{$barang->nama_produk}}" id="nama_produk" placeholder="" readonly>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Kain <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="kain" value="{{$barang->kain}}" placeholder="" required>
                                </div>

                                <div class="col-md-6">
                                    <label>Benang  <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="benang" value="{{$barang->benang}}" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Dakron</label>
                                    <input class="form-control" type="text" name="dakron" value="{{$barang->dakron}}" placeholder="" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Estimasi</label>
                                    <input class="form-control" type="text" name="estimasi" value="{{$barang->estimasi}}" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>size  <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <select class="form-control" type="text" name="size" value="{{$barang->size}}" id="size" placeholder="" readonly>
                                    </select>
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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="../assets/js/pemesanan.js"></script>
    {{-- Ajax for Kode Produk --}}
        <script>
            $(document).ready(function() {
                $('.dynamic').change(function() {
                    if ($(this).val() != '') {
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dependent = $(this).data('dependent');
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('bom.ajax') }}",
                            method: "POST",
                            data: {
                                select: select,
                                value: value,
                                _token: _token,
                                dependent: dependent
                            },
                            success: function(result) {
                                $('#' + dependent).html(result);
                            }
                        })
                    }
                });
                $('#id').change(function() {
                    $('#kode_produk').val('');
                });
            });
        </script>
    {{-- Ajax for Nama Produk --}}
        <script>
            $(document).ready(function() {
                $('.dynamic').change(function() {
                    if ($(this).val() != '') {
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dynamic1 = $(this).data('dynamic1');
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('bom.ajax1') }}",
                            method: "POST",
                            data: {
                                select: select,
                                value: value,
                                _token: _token,
                                dynamic1: dynamic1
                            },
                            success: function(result) {
                                $('#' + dynamic1).html(result);
                            }
                        })
                    }
                });
                $('#id').change(function() {
                    $('#nama_produk').val('');
                });
            });
        </script>
    {{-- Ajax for size Produk --}}
        <script>
            $(document).ready(function() {
                $('.dynamic').change(function() {
                    if ($(this).val() != '') {
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dynamic2 = $(this).data('dynamic2');
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('bom.ajax2') }}",
                            method: "POST",
                            data: {
                                select: select,
                                value: value,
                                _token: _token,
                                dynamic2: dynamic2
                            },
                            success: function(result) {
                                $('#' + dynamic2).html(result);
                            }
                        })
                    }
                });
                $('#id').change(function() {
                    $('#size').val('');
                });
            });
        </script>
@endsection