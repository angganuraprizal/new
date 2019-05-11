@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Tambah Kategori</div>

				<div class="card-body">
					<form action="{{ route('kategori.store') }}" method="POST" data-toggle="validator" role="form">
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