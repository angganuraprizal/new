@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Table Kategori</div>

				<div class="card-body">
					@if (session()->has('flash_notification.message'))
						<div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{!! session()->get('flash_notification.message') !!}
						</div>
					@endif
					<a href="{{ route('kategori.create') }}">
						<button class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air" title="Tambah" data-toggle="tooltip" data-placement="top">
							<i class="fa fa-plus-circle"></i>
							<span class="btn-text">Tambah</span>
						</button>
					</a>
					<br>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped" >
								<head>
									<tr>
										<td>NO</td>
										<td>Nama</td>
										<td>Action</td>
									</tr>
								</head>
								<body>
									@php $no = 1; @endphp
									@foreach($kategoris as $data)
									<tr>
										<td> {{ $no++ }} </td>
										<td> {{ $data->nama }} </td>
										<td>
											<div class="row">
												<div class="col-md-2">
													<!-- Edit -->
													<a href="{{ route('kategori.edit',$data->id) }}">
														<button class="btn btn-sm btn-outline-info m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
															<ion-icon name="create"></ion-icon>
															<span>Edit</span>
														</button>
													</a>
												</div>
												<div class="col-md-2">
													<!-- Delete -->
													<form action="{{ route('kategori.destroy', $data->id) }}" method="post">
														<input type="hidden" name="_method" value="Delete">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<button type="submit" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-outline-danger m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
															<i class="fa fa-trash-o"></i>
															<span>Hapus</span>
														</button>
													</form>
												</div>
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