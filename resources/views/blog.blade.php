@extends('layouts.guest')

@section('content')

	<!--/ Intro Skew Star /-->
	<div id="home" class="intro intro-single route bg-image" style="background-image: url(devfolio/img/overlay-bg.jpg)">
		<div class="overlay-mf"></div>
		<div class="intro-content display-table">
			<div class="table-cell">
				<div class="container">
					<h2 class="intro-title mb-4">News</h2>
					<ol class="breadcrumb d-flex justify-content-center">
						<li class="breadcrumb-item">
							<a href="{{ url('/') }}">Home</a>
						</li>
						<li class="breadcrumb-item active">News</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!--/ Intro Skew End /-->

	<!--/ Section Blog Star /-->
	<section id="blog" class="blog-mf sect-pt4 route">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						@foreach($artikels as $data)
						<div class="col-md-6">
							<div class="card card-blog">
								<div class="card-img">
									<a href="/blog/{{$data->slug}}"><img src="{{ $data->foto }}" alt="" class="img-fluid"></a>
								</div>
								<div class="card-body">
									<div class="card-category-box">
										<div class="card-category">
											<h6 class="category">{{ $data->kategori->nama }}</h6>
										</div>
									</div>
									<h3 class="card-title"><a href="/blog/{{$data->slug}}">{{ $data->judul}}</a></h3>
									<p class="card-description">
										{!! str_limit($data->isi) !!}
									</p>
								</div>
								<div class="card-footer">
									<div class="post-author">
										<img src="{{ asset('devfolio/img/testimonial-2.jpg') }}" alt="" class="avatar rounded-circle">
										<span class="author">{{ $data->user->name }}</span>
									</div>
									<div class="post-date">
										<span class="ion-ios-clock-outline"></span> {{ $data->created_at->format('Y-m-d') }}
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<div class="col-md-12">
							<div class="pull-right">
								{{ $artikels->links() }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="widget-sidebar">
						<h5 class="sidebar-title">Recent Post</h5>
						<div class="sidebar-content">
							<ul class="list-sidebar">
								@foreach($blogs as $data)
								<li>
									<a href="/blog/{{$data->slug}}"> {{ $data->judul }} </a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="widget-sidebar widget-tags">
						<h5 class="sidebar-title">Tags</h5>
						<div class="sidebar-content">
							<ul>
								@foreach($kategoris as $data)
								<li>
									<a href="{{ route('filter', $data->slug) }}">{{ $data->nama }}</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!--/ Section Blog End /-->

@endsection