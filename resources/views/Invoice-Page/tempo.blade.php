		
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
				<li class="active">Register Payment</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Register Payment</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('invoice.update',$invoices->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <h4 class="card-header">Register Payment</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-6 no-padding">
                            <div style="margin-left: 1rem">
                                <div>
                                    <label>Register Payment</label>
                                    <select class="form-control" type="text" name="jatuh_tempo" placeholder="" required>
                                        <option disable selected>-- Pilih Jenis --</option>
                                        <option value="15 Hari">15 Hari</option>
                                        <option value="20 Hari">20 Hari</option>
                                        <option value="30 Hari">30 Hari</option>
                                    </select>
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