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
    <link rel="stylesheet" href="{{ asset('/ElaAdmin/assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('/ElaAdmin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/ElaAdmin/assets/css/style.css')}}">

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
							<li class="active">Artikel</li>
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
				<strong class="card-title">Table Artikel</strong>
			</div>
			
			<div class="card-body">
				@if (session()->has('flash_notification.message'))
					<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{!! session()->get('flash_notification.message') !!}
					</div>
				@endif
				<button type="button" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air" data-toggle="modal" data-target="#createartikel">
					<i class="fa fa-plus-circle"></i>
					Tambah
				</button>
				<div class="modal fade" id="createartikel" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="largeModalLabel">Create Artikel</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="{{route('artikel.store')}}" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
								<div class="modal-body">
								
									{{csrf_field()}}

									<input type="hidden" name="user_id" class="form-control" value="{{ auth::user()->id }}">

									<div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
										<label class="control-label mb-10">Kategori</label>
										<select name="kategori_id" class="form-control">
											<option class="txt-grey" disabled selected>-- Pilih Kategori --</option>
											@foreach($kategoris as $data)
											<option value="{{$data->id}}">{{$data->nama}}</option>
											@endforeach
										</select>
										@if ($errors->has('kategori_id'))
											<span class="help-block">
												<strong>{{ $errors->first('kategori_id') }}</strong>
											</span>
										@endif
									</div>

									<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
										<label class="control-label mb-10">Judul</label>
										<input type="text" name="judul" placeholder="Input judul" class="form-control"  required>
										@if ($errors->has('judul'))
										<span class="help-block">
											<strong>{{ $errors->first('judul') }}</strong>
										</span>
										@endif
									</div>

									<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
										<label class="control-label mb-10">Foto</label>
										<input type="url" name="foto" placeholder="Input url foto" class="form-control" required>
										@if ($errors->has('foto'))
											<span class="help-block">
												<strong>{{ $errors->first('foto') }}</strong>
											</span>
										@endif
									</div>

									<div class="form-group {{ $errors->has('statusprivate') ? ' has-error' : '' }}">
										<label class="control-label mb-10">Status</label>
										<select name="asd" class="form-control">
											<option class="txt-grey" disabled selected>-- Pilih Asd --</option>
											<option value="0">Public</option>
											<option value="1">Private</option>
										</select>
										@if ($errors->has('asd'))
											<span class="help-block">
												<strong>{{ $errors->first('statusprivate') }}</strong>
											</span>
										@endif
									</div>

									<div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
										<label class="control-label mb-10">Isi</label>
										<textarea id="text" type="ckeditor" name="isi" class="ckeditor" required></textarea>
										@if ($errors->has('isi'))
											<span class="help-block">
												<strong>{{ $errors->first('isi') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-success btn-rounded" data-dismiss="modal"><i class="fa fa-spin fa-refresh">&nbsp;</i>Cancel</button>
									<button type="submit" class="btn btn-success btn-rounded"><i class="fa fa-check">&nbsp;</i>Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-md-12">
						<table id="artikel" class="table table-striped table-responsive display" >
							<thead>
								<tr>
									<td style="color: black;">NO</td>
									<td style="color: black;">Kategori</td>
									<td style="color: black;">Foto</td>
									<td style="color: black;">Judul</td>
									<td style="color: black;">isi</td>
									<td style="color: black;">Action</td>
								</tr>
							</thead>
							<tbody>
								@php $no = 1; @endphp
								@foreach($artikels as $data)
								<tr>
									<td style="color: black;"> {{ $no++ }} </td>
									<td style="color: black;"> {{ $data->kategori->nama }} </td>
									<td>
										<img src="{{ $data->foto }}" width="70" height="70">
									</td>
									<td style="color: black;"> {!! str_limit($data->judul,25) !!} </td>
									<td style="color: black;"> {!! str_limit($data->isi,25) !!} </td>
									<td>
										<div class="row">
											<div class="col-md-4">
												<!-- Verify -->
												@if($data->status == 0)
													<form method="post" action="{{ route('verify',$data->id) }}">
														{{ csrf_field() }}
														<button type="submit" class="btn btn-outline-success" onclick="return confirm('Are you sure?')">Verify</button>
													</form>
												@else
													<button type="submit" class="btn btn-outline-danger" disabled="disabled">Sudah Verify</button>
												@endif
											</div>
											<div class="col-md-4">
												<!-- Edit -->
												<a href="{{ route('artikel.edit',$data->id) }}">
													<button class="btn btn-sm btn-outline-info m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
														<i class="fa fa-edit"></i>
													</button>
												</a>
											</div>
											<div class="col-md-4">
												<!-- Delete -->
												<form action="{{ route('artikel.destroy', $data->id) }}" method="post">
													<input type="hidden" name="_method" value="Delete">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<button type="submit" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-outline-danger m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
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
	<script src="{{ asset('/ckeditor/ckeditor.js') }}" defer></script>


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
            $('#artikel').DataTable();
        } );
    </script>
@endsection