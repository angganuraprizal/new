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
				<strong class="card-title">Edit Artikel</strong>
			</div>
			<div class="card-body">
				<form action="{{ route('artikel.update', $artikels->id) }}" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
					<input name="_method" type="hidden" value="PATCH">
					{{csrf_field()}}

					<input type="hidden" name="user_id" class="form-control" value="{{ auth::user()->id }}" required>

					<div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
						<label class="control-label mb-10">Kategori</label>
						<select name="kategori_id" class="form-control">
							@foreach($kategoris as $data)
							<option value="{{$data->id}}" {{$selectedKategori == $data->id ?'selected = "selected"': ''}} >{{$data->nama}}</option>
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
						<input type="text" name="judul" class="form-control" value="{{ $artikels->judul }}" required>
						@if ($errors->has('judul'))
						<span class="help-block">
							<strong>{{ $errors->first('judul') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('foto') ? ' has-error' : '' }}">
						<label class="control-label mb-10">Foto</label><br>
						<img src="{{ $artikels->foto }}" width="200" ><br><br>
						<input type="url" name="foto" class="form-control" value="{{ $artikels->foto }}">
						@if ($errors->has('foto'))
						<span class="help-block">
							<strong>{{ $errors->first('foto') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
						<label class="control-label mb-10">Isi</label>
						<textarea id="text" type="ckeditor" name="isi" class="ckeditor" required>{{ $artikels->isi }}</textarea>
						@if ($errors->has('isi'))
						<span class="help-block">
							<strong>{{ $errors->first('isi') }}</strong>
						</span>
						@endif
					</div>

					<div class="pull-right">
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-rounded"><i class="fa fa-check">&nbsp;</i>Simpan</button>
							<button type="reset" class="btn btn-danger btn-rounded"><i class="fa fa-spin fa-refresh"></i>&nbsp;Reset</button>
						</div>
					</div>
				</form>
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
	<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
@endsection