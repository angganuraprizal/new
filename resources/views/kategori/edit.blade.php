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
				<strong class="card-title">Table Category</strong>
			</div>
			<div class="card-body">
				<form action="{{ route('kategori.update', $kategoris->id) }}" method="post">
					<input name="_method" type="hidden" value="PATCH">
					{{csrf_field()}}

					<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
						<label class="control-label mb-10">Nama</label>
						<input type="text" name="nama" class="form-control" value="{{ $kategoris->nama }}" required>
						@if ($errors->has('nama'))
						<span class="help-block">
							<strong>{{ $errors->first('nama') }}</strong>
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
@endsection
