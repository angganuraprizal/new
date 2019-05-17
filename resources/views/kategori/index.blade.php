@extends('layouts.backend')

@section('css')
	<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
	<link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('/ElaAdmin/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('/ElaAdmin/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/ElaAdmin/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('breadcrumb')
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-4">
				<div class="page-header float-left">
					<div class="page-title">
						<h1>Dashboard</h1>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ url('/home')}}">Dashboard</a></li>
							<li class="active">Kategori</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<strong class="card-title">Table Category</strong>
			</div>
			<div class="card-body">
				@if (session()->has('flash_notification.message'))
					<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{!! session()->get('flash_notification.message') !!}
					</div>
				@endif
				<button type="button" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air" data-toggle="modal" data-target="#createkategori">
					<i class="fa fa-plus-circle"></i>
					<span class="btn-text">Tambah</span>
				</button>

				<div class="modal fade" id="createkategori" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="mediumModalLabel">Create Kategori</h5>
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<form action="{{ route('kategori.store') }}" method="POST" data-toggle="validator" role="form">
								<div class="modal-body">
									{{csrf_field()}}

									<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
										<label class="control-label mb-10">Nama</label>
										<input type="text" name="nama" class="form-control"  required>
										@if ($errors->has('nama'))
											<span class="help-block">
												<strong>{{ $errors->first('nama') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-success btn-rounded">Simpan</button>
									<button type="reset" class="btn btn-danger btn-rounded" data-dismiss="modal">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-md-12">
						<table id="kategori" class="table table-striped display" >
							<thead>
								<tr>
									<td style="color: black;">NO</td>
									<td style="color: black;">Nama</td>
									<td style="color: black;">Action</td>
								</tr>
							</thead>
							<tbody>
								@php $no = 1; @endphp
								@foreach($kategoris as $data)
								<tr>
									<td style="color: black;"> {{ $no++ }} </td>
									<td style="color: black;"> {{ $data->nama }} </td>
									<td>
										<div class="row">
											<div class="col-md-2">
												<!-- Edit -->
												<a href="{{ route('kategori.edit',$data->id) }}">
													<button class="btn btn-sm btn-outline-info m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air" title="Edit" data-toggle="tooltip" data-placement="top">
														<i class="fa fa-edit"></i>
													</button>
												</a>
											</div>
											<div class="col-md-2">
												<!-- Delete -->
												<form action="{{ route('kategori.destroy', $data->id) }}" method="post">
													<input type="hidden" name="_method" value="Delete">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<button type="submit" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-outline-danger m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air" title="Hapus" data-toggle="tooltip" data-placement="top">
														<i class="fa fa-trash-o"></i>
													</button>
												</form>
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
	<script src="{{ asset('/ElaAdmin/assets/js/main.js') }}"></script>

    <script src="{{ asset('/ElaAdmin/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('/ElaAdmin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/ElaAdmin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/ElaAdmin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/ElaAdmin/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('/ElaAdmin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/ElaAdmin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/ElaAdmin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/ElaAdmin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/ElaAdmin/assets/js/init/datatables-init.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#kategori').DataTable();
        });
    </script>
@endsection
