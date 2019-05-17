@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Tambah Artikel</div>

				<div class="card-body">
					<form action="{{route('artikel.store')}}" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
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

						<div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
							<label class="control-label mb-10">Isi</label>
							<textarea id="text" type="ckeditor" name="isi" class="ckeditor" required></textarea>
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
</div>
@endsection
