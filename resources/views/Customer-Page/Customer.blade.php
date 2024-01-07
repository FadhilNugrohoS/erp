		
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
				<li class="active">Data Customer</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Customer</h1>
			</div>
		</div><!--/.row-->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <a type="button" class="btn btn-primary btn-lg" href="{{ route ('customer.create') }} ">+</a>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Customer</th>
                <th rowspan="2">Email Customer</th>
                <th rowspan="2">Alamat Customer</th>
                <th rowspan="2">Nomor Customer</th>
                <th rowspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer )
                <tr style="text-align: center">
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->nama_customer}}</td>
                    <td>{{$customer->email_customer}}</td>
                    <td>{{$customer->alamat_customer}}</td>
                    <td>{{$customer->nomor_customer}}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                            <a href="{{ route('customer.edit', $customer->id) }}"
                                class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
@endsection