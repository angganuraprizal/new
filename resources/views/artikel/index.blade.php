@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Dashboard</div>

				<div class="card-body">
					<a href="{{ route('artikel.create') }}">
						<button class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air" title="Tambah" data-toggle="tooltip" data-placement="top">
							<i class="fa fa-plus-circle"></i>
							<span class="btn-text">Tambah</span>
						</button>
					</a>
					<br>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped table-responsive">
								<head>
									<tr>
										<td>NO</td>
										<td>Kategori</td>
										<td>Foto</td>
										<td>Judul</td>
										<td>isi</td>
										<td>Action</td>
									</tr>
								</head>
								<body>
									@php $no = 1; @endphp
									@foreach($artikels as $data)
									<tr>
										<td> {{ $no++ }} </td>
										<td> {{ $data->kategori->nama }} </td>
										<td>
											<img src="{{ $data->foto }}" width="70" height="70">
										</td>
										<td> {!! str_limit($data->judul,50) !!} </td>
										<td> {!! str_limit($data->isi,50) !!} </td>
										<td>
											<div class="row">
												<div class="col-md-4">
													<!-- Edit -->
													<a href="{{ route('artikel.edit',$data->id) }}">
														<button class="btn btn-sm btn-outline-info m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
															<i class="fa fa-edit"></i>
															<span>Edit</span>
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
															<span>Hapus</span>
														</button>
													</form>
												</div>
												<div class="col-md-4"></div>
											</div>
										</td>
									</tr>
									@endforeach
								</body>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
