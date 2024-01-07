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
                <li class="active">RFQ</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">RFQ</h1>
            </div>
        </div>
        <!--/.row-->
        <form action="{{route('rfq.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h4 class="card-header">Bahan Baku</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-12 col-lg-12">
                            <div style="margin-left: 1rem">
                                <td>
                                    <label>Pilih Bahan Baku</label>
                                    <select id="id" class="form-control dynamic " type="text" name="id"
                                        data-dependent="bahan_baku" data-dynamic1="harga" data-dynamic2="nama_vendor"
                                        data-dynamic3="email_vendor" data-dynamic4="telpon_vendor" required>
                                        <option disabled selected> Pilih </option>
                                        @foreach ($vendors as $ven)
                                        <option value="{{$ven->id}}">
                                            {{$ven->nama_vendor}} || {{$ven->bahan_baku}} || {{$ven->harga}}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <label>Bahan Baku</label>
                                    <select class="form-control" type="text" name="bahan_baku" id="bahan_baku"
                                        placeholder="" readonly>
                                    </select>
                                </td>
                                <td>
                                    <label>Harga</label>
                                    <select class="form-control" type="text" name="harga" id="harga" placeholder=""
                                        readonly>
                                    </select>
                                </td>
                                <td>
                                    <label>Quantity</label>
                                    <input class="form-control" type="text" name="quantity" id="jumlah" placeholder=""
                                        onchange="pemesanan();" required>
                                </td>
                                <td>
                                    <label>Total Harga</label>
                                    <input class="form-control" type="text" name="total" id="total" placeholder=""
                                        readonly>
                                </td>
                                <td>
                                    <label>Nama Vendor</label>
                                    <select class="form-control" type="text" name="nama_vendor" id="nama_vendor"
                                        placeholder="" readonly>
                                    </select>
                                </td>
                                <td>
                                    <label>Email Vendor</label>
                                    <select class="form-control" type="text" name="email_vendor" id="email_vendor"
                                        placeholder="" readonly>
                                    </select>
                                </td>
                                <td>
                                    <label>Telpon Vendor</label>
                                    <select class="form-control" type="text" name="telpon_vendor" id="telpon_vendor"
                                        placeholder="" readonly>
                                    </select>
                                </td>
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
        <script>
            function pemesanan() {
                var produk = document.getElementById('harga').value;
                var jumlah = document.getElementById('jumlah').value;
                var total = parseFloat(produk) * parseFloat(jumlah);
                if (!isNaN(total)) {
                    document.getElementById('total').value = total;
                } else {
                    document.getElementById('total').value = produk;
                }
            }
        </script>
        {{-- Ajax for Bahan --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dependent = $(this).data('dependent');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('rfq.ayax') }}",
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
                        $('#bahan_baku').val('');
                    });
                });
        </script>

        {{-- Ajax for Harga --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic1 = $(this).data('dynamic1');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('rfq.ayax1') }}",
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

        {{-- Ajax for Nama Vendor --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic2 = $(this).data('dynamic2');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('rfq.ayax2') }}",
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
                        $('#nama_vendor').val('');
                    });
                });
        </script>
        {{-- Ajax for email_vendor --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic3 = $(this).data('dynamic3');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('rfq.ayax3') }}",
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
                        $('#email_vendor').val('');
                    });
                });
        </script>
        {{-- Ajax for telpon_vendor --}}
        <script>
            $(document).ready(function() {
                    $('.dynamic').change(function() {
                        if ($(this).val() != '') {
                            var select = $(this).attr("id");
                            var value = $(this).val();
                            var dynamic4 = $(this).data('dynamic4');
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: "{{ route('rfq.ayax4') }}",
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
                        $('#telpon_vendor').val('');
                    });
                });
        </script>
        @endsection