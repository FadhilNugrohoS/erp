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
        <form action="{{route('kasir.store')}}" method="POST" enctype="multipart/form-data">
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
                                        data-dependent="kode_produk" data-dynamic1="nama_produk"
                                        data-dynamic2="ukuran_panjang" data-dynamic3="ukuran_lebar"
                                        data-dynamic4="harga" data-dynamic5="berat" data-dynamic6="size" required>
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
                                    <label>Kode Produk</label>
                                    <select class="form-control" type="text" name="kode_produk" id="kode_produk"
                                        placeholder="" readonly>
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
                                    <label>Ukuran Panjang</label>
                                    <select class="form-control" type="text" name="ukuran_panjang" id="ukuran_panjang"
                                        placeholder="" readonly>
                                    </select>
                                </td>
                            </div>
                            <div class="col-xs-12 col-md-6" style="padding-left: 0; margin-bottom: 12px;">
                                <td>
                                    <label>Ukuran Lebar</label>
                                    <select class="form-control" type="text" name="ukuran_lebar" id="ukuran_lebar"
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
                                    <label>Berat</label>
                                    <select class="form-control" type="text" name="berat" id="berat" placeholder=""
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

                            <br><br>
                            <td>
                                <label>Nama Pemesan</label>
                                <input class="form-control" type="text" name="nama_pemesan" placeholder="" required>
                            </td>
                            <td>
                                <label>Nomor Pemesan</label>
                                <input class="form-control" type="text" name="kontak_pemesan" placeholder="" required>
                            </td>
                            <td>
                                <label>Alamat Pemesan</label>
                                <input class="form-control" type="text" name="alamat_pemesan" placeholder="" required>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-info" style="margin: 1.5rem 0">Simpan
                                    Data</button>
                            </td>
                        </div>
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
                                url: "{{ route('kasir.ajax') }}",
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
                                url: "{{ route('kasir.ajax1') }}",
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

        {{-- Ajax for Ukuran Panjang --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic2 = $(this).data('dynamic2');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('kasir.ajax2') }}",
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
                        $('#ukuran_panjang').val('');
                    });
                });
        </script>
        {{-- Ajax for Ukuran Lebar --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic3 = $(this).data('dynamic3');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('kasir.ajax3') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                    dynamic3: dynamic3
                                },
                                success: function(result) {
                                    $('#' + dynamic3).html(result);
                                }
                            })
                        }
                    });
                    $('#id').change(function() {
                        $('#ukuran_lebar').val('');
                    });
                });
        </script>
        {{-- Ajax for Ukuran Harga --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic4 = $(this).data('dynamic4');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('kasir.ajax4') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                    dynamic4: dynamic4
                                },
                                success: function(result) {
                                    $('#' + dynamic4).html(result);
                                }
                            })
                        }
                    });
                    $('#id').change(function() {
                        $('#harga').val('');
                    });
                });
        </script>
        {{-- Ajax for Ukuran Berat--}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic5 = $(this).data('dynamic5');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('kasir.ajax5') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                    dynamic5: dynamic5
                                },
                                success: function(result) {
                                    $('#' + dynamic5).html(result);
                                }
                            })
                        }
                    });
                    $('#id').change(function() {
                        $('#berat').val('');
                    });
                });
        </script>
        {{-- Ajax for Ukuran size--}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic6 = $(this).data('dynamic6');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('kasir.ajax6') }}",
                                method: "POST",
                                data: {
                                    select: select,
                                    value: value,
                                    _token: _token,
                                    dynamic6: dynamic6
                                },
                                success: function(result) {
                                    $('#' + dynamic6).html(result);
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