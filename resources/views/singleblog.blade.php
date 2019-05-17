@extends('layouts.guest')

@section('content')

	<!--/ Intro Skew Star /-->
	<div class="intro intro-single route bg-image" style="background-image: url(/devfolio/img/overlay-bg.jpg)">
		<div class="overlay-mf"></div>
		<div class="intro-content display-table">
			<div class="table-cell">
				<div class="container">
					<h2 class="intro-title mb-4">Blog Details</h2>
					<ol class="breadcrumb d-flex justify-content-center">
						<li class="breadcrumb-item">
							<a href="{{ url('/') }}">Home</a>
						</li>
						<li class="breadcrumb-item">
							<a href="{{ url('/blog') }}">Blog</a>
						</li>
						<li class="breadcrumb-item active">Detail</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!--/ Intro Skew End /-->

	<!--/ Section Blog-Single Star /-->
	<section class="blog-wrapper sect-pt4" id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post-box">
						<div class="post-thumb">
							<img src="{{ $artikels->foto }}" class="img-fluid" alt="">
						</div>
						<div class="post-meta">
							<h1 class="article-title">{{ $artikels->judul }}</h1>
							<ul>
								<li>
									<span class="ion-ios-person"></span>
									<span style="color: black;">{{ $artikels->user->name }}</span>
								</li>
								<li>
									<span class="ion-pricetag"></span>
									<a href="{{ route('filter', $artikels->kategori->slug) }}" style="color: black;">{{ $artikels->kategori->nama }}</a>
								</li>
								<li>
									<span class="ion-chatbox"></span>
									<a href="/blog/{{ $artikels->slug}}#disqus_thread"></a>
								</li>
								<li>
									<span class="ion-eye"></span>
									<span>{{ $artikels->visit_count}}</span>
								</li>
							</ul>
						</div>
						<div class="article-content" style="text-align: justify;">
							{!! $artikels->isi !!}
							<!-- <blockquote class="blockquote">
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							</blockquote>
							<p>
								Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
								aliquet elit, eget tincidunt
								nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
								consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
							</p> -->
							<h4>Share On</h4>
							<div class="sharethis-inline-share-buttons"></div>
						</div>
					</div>

					<div id="comment" class="box-comments">
						<div id="disqus_thread"></div>
							<script>

							/**
							*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
							*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
							/*
							var disqus_config = function () {
							this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
							this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
							};
							*/
							(function() { // DON'T EDIT BELOW THIS LINE
								var d = document, s = d.createElement('script');
								s.src = 'https://news-roevedaike.disqus.com/embed.js';
								s.setAttribute('data-timestamp', +new Date());
								(d.head || d.body).appendChild(s);
							})();
						</script>
						<script id="dsq-count-scr" src="//news-roevedaike.disqus.com/count.js" async></script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
						<!-- <div class="title-box-2">
							<h4 class="title-comments title-left">Comments (34)</h4>
						</div>
						<ul class="list-comments">
							<li>
								<div class="comment-avatar">
									<img src="{{ asset('devfolio/img/testimonial-2.jpg') }}" alt="">
								</div>
								<div class="comment-details">
									<h4 class="comment-author">Oliver Colmenares</h4>
									<span>18 Sep 2017</span>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
										ipsam temporibus maiores
										quae natus libero optio, at qui beatae ducimus placeat debitis voluptates amet corporis.
									</p>
									<a href="3">Reply</a>
								</div>
							</li>
							<li>
								<div class="comment-avatar">
									<img src="{{ asset('devfolio/img/testimonial-4.jpg') }}" alt="">
								</div>
								<div class="comment-details">
									<h4 class="comment-author">Carmen Vegas</h4>
									<span>18 Sep 2017</span>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
										ipsam temporibus maiores
										quae natus libero optio, at qui beatae ducimus placeat debitis voluptates amet corporis,
										veritatis deserunt.
									</p>
									<a href="3">Reply</a>
								</div>
							</li>
							<li class="comment-children">
								<div class="comment-avatar">
									<img src="{{ asset('devfolio/img/testimonial-2.jpg') }}" alt="">
								</div>
								<div class="comment-details">
									<h4 class="comment-author">Oliver Colmenares</h4>
									<span>18 Sep 2017</span>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
										ipsam temporibus maiores
										quae.
									</p>
									<a href="3">Reply</a>
								</div>
							</li>
							<li>
								<div class="comment-avatar">
									<img src="{{ asset('devfolio/img/testimonial-2.jpg') }}" alt="">
								</div>
								<div class="comment-details">
									<h4 class="comment-author">Oliver Colmenares</h4>
									<span>18 Sep 2017</span>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
										ipsam temporibus maiores
										quae natus libero optio.
									</p>
									<a href="3">Reply</a>
								</div>
							</li>
						</ul> -->
					</div>
					<!-- <div class="form-comments">
						<div class="title-box-2">
							<h3 class="title-left">
								Leave a Reply
							</h3>
						</div>
						<form class="form-mf">
							<div class="row">
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<input type="text" class="form-control input-mf" id="inputName" placeholder="Name *" required>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<input type="email" class="form-control input-mf" id="inputEmail1" placeholder="Email *" required>
									</div>
								</div>
								<div class="col-md-12 mb-3">
									<div class="form-group">
										<input type="url" class="form-control input-mf" id="inputUrl" placeholder="Website">
									</div>
								</div>
								<div class="col-md-12 mb-3">
									<div class="form-group">
										<textarea id="textMessage" class="form-control input-mf" placeholder="Comment *" name="message"
											cols="45" rows="8" required></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<button type="submit" class="button button-a button-big button-rouded">Send Message</button>
								</div>
							</div>
						</form>
					</div> -->
				</div>
				<div class="col-md-4">
					<div class="widget-sidebar sidebar-search">
						<h5 class="sidebar-title">Search</h5>
						<div class="sidebar-content">
							<form action="/blog/search" method="GET" role="search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for..." name="cari" aria-label="Search for...">
									<span class="input-group-btn">
									<button class="btn btn-secondary btn-search" type="submit">
									<span class="ion-android-search"></span>
									</button>
									</span>
								</div>
							</form>
						</div>
					</div>
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
					<!-- <div class="widget-sidebar">
						<h5 class="sidebar-title">Archives</h5>
						<div class="sidebar-content">
							<ul class="list-sidebar">
								<li>
									<a href="#">September, 2017.</a>
								</li>
								<li>
									<a href="#">April, 2017.</a>
								</li>
								<li>
									<a href="#">Nam quo autem exercitationem.</a>
								</li>
								<li>
									<a href="#">Atque placeat maiores nam quo autem</a>
								</li>
								<li>
									<a href="#">Nam quo autem exercitationem.</a>
								</li>
							</ul>
						</div>
					</div> -->
					<div class="widget-sidebar widget-tags">
						<h5 class="sidebar-title">Kategori</h5>
						<div class="sidebar-content">
							<ul>
								@foreach($kategoris as $data)
								<div class="row">
									<div class="col-md-12">
										<li>
											<a href="{{ route('filter', $data->slug) }}">{{ $data->nama }}&nbsp;<span>({{ $data->Artikel->count() }})</span></a>
										</li>
									</div>
								</div>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ Section Blog-Single End /-->

	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5cda76bf0ab8d400129d3332&product='inline-share-buttons' async='async'></script>
	<script
		src="https://code.jquery.com/jquery-3.1.1.min.js"
		integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		crossorigin="anonymous"></script>

@endsection