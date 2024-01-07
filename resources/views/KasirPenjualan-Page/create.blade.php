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
                <li class="active">Kasir</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kasir</h1>
            </div>
        </div>
        <!--/.row-->
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h4 class="card-header">Produk</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="col-xs-12 col-md-6 col-lg-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Detail Produk</label>
                                    <select id="id" class="form-control dynamic " type="text" name="id"
                                        data-dependent="nama_produk" data-dynamic1="harga" data-dynamic2="size" required>
                                        <option disabled selected> Pilih </option>
                                        @foreach ($barangs as $barang)
                                        <option value="{{$barang->id}}">
                                            {{$barang->kode_produk}} || {{$barang->nama_produk}} ||
                                            {{$barang->size}}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Nama Produk</label>
                                    <select class="form-control" type="text" name="nama_produk" id="nama_produk"
                                        placeholder="" readonly>
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Harga</label>
                                    <select class="form-control" type="text" name="harga" id="harga" placeholder=""
                                        readonly>
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Size</label>
                                    <select class="form-control" type="text" name="size" id="size" placeholder=""
                                        readonly>
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Jumlah Pesanan</label>
                                    <input class="form-control" type="text" name="jumlah" id="jumlah" placeholder=""
                                        onchange="pesan()" required>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Total Harga</label>
                                    <input class="form-control" type="text" name="total" id="total" placeholder=""
                                        readonly>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Data Customer</label>
                                    <select id="id" class="form-control dynamic " type="text" name="id"
                                        data-dependent1="nama_customer" data-dynamic3="alamat_customer" data-dynamic4="email_customer" data-dynamic5="nomor_customer" required>
                                        <option disabled selected> Pilih </option>
                                        @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">
                                            {{$customer->nama_customer}} || {{$customer->alamat_customer}}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Nama Customer</label>
                                    <select class="form-control" type="text" name="nama_customer" placeholder="" id="nama_customer"
                                    placeholder="" readonly>
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Alamat Customer</label>
                                    <select class="form-control" type="text" name="alamat_customer" placeholder="" id="alamat_customer"
                                    placeholder="" readonly>
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Email Customer</label>
                                    <select class="form-control" type="text" name="email_customer" placeholder="" id="email_customer"
                                    placeholder="" readonly>
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Nomor Customer</label>
                                    <select class="form-control" type="text"  name="nomor_customer" placeholder="" id="nomor_customer"
                                    placeholder="" readonly>
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;"> 
                                <td>
                                    <button type="submit" class="btn btn-info" style="margin: 1.5rem 0">Simpan
                                        Data</button>
                                </td>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="../assets/js/pemesanan.js"></script>

        {{-- Ajax for Nama Produk --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dependent = $(this).data('dependent');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('sale.ajax') }}",
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
                        $('#nama_produk').val('');
                    });
                });
        </script>

        {{-- Ajax for Harga Produk --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic1 = $(this).data('dynamic1');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('sale.ajax1') }}",
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
                        $('#harga').val('');
                    });
                });
        </script>

        {{-- Ajax for Size --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic2 = $(this).data('dynamic2');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('sale.ajax2') }}",
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
        {{-- Ajax for nama produk --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dependent1 = $(this).data('dependent1');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('sale.ajax3') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                   dependent1:dependent1
                                },
                                success: function(result) {
                                    $('#' + dependent1).html(result);
                                }
                            })
                        }
                    });
                    $('#id').change(function() {
                        $('#nama_customer').val('');
                    });
                });
        </script>

        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic3 = $(this).data('dynamic3');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('sale.ajax4') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                   dynamic3:dynamic3
                                },
                                success: function(result) {
                                    $('#' + dynamic3).html(result);
                                }
                            })
                        }
                    });
                    $('#id').change(function() {
                        $('#alamat_customer').val('');
                    });
                });
        </script>
        
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic4 = $(this).data('dynamic4');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('sale.ajax5') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                   dynamic4:dynamic4
                                },
                                success: function(result) {
                                    $('#' + dynamic4).html(result);
                                }
                            })
                        }
                    });
                    $('#id').change(function() {
                        $('#email_customer').val('');
                    });
                });
        </script>

        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic5 = $(this).data('dynamic5');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('sale.ajax6') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                   dynamic5:dynamic5
                                },
                                success: function(result) {
                                    $('#' + dynamic5).html(result);
                                }
                            })
                        }
                    });
                    $('#id').change(function() {
                        $('#nomor_customer').val('');
                    });
                });
        </script>