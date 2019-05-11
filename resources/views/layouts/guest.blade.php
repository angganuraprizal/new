<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>NEWS</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('/img/news.png')}}" rel="icon">
  <link href="{{ asset('/devfolio/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('/devfolio/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('/devfolio/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/devfolio/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/devfolio/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('/devfolio/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
	Theme Name: DevFolio
	Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
	Author: BootstrapMade.com
	License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="page-top">
	<!--/ Nav Star /-->
	<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll" href="#page-top">NEWS</a>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
				aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span></span>
			<span></span>
			<span></span>
			</button>
			<div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link js-scroll {{url('/') == request()->url() ? 'active' : ''}}" href="{{ url('/') }}">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll {{url('/blog') == request()->url() ? 'active' : ''}}" href="{{ url('blog') }}">Blog</a>
					</li>
					@if (Auth::check())
						<li class="nav-item">
							<a class="nav-link js-scroll {{url('/home') == request()->url() ? 'active' : ''}}" href="{{ url('/home') }}">Dashboard</a>
						</li>
					@endif

					@guest
						
						<li class="nav-item">
							<a class="nav-link js-scroll" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
					@else
						<li class="nav-item">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
								   onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
	<!--/ Nav End /-->
	
	<!-- Section Content -->
	<style>
	  p.uppercase {
		  text-transform: uppercase;
		  }
	p.lowercase {
		text-transform: lowercase;
	}

p.capitalize {
  text-transform: capitalize;
}
</style>
	@yield('content')
	<!-- End Section -->
	
	<!--/ Section Contact-Footer Star /-->
	<section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(/devfolio/img/overlay-bg.jpg)">
		<div class="overlay-mf"></div>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="copyright-box">
							<p class="copyright">&copy; Copyright <strong>DevFolio</strong>. All Rights Reserved</p>
							<div class="credits">
								<!--
									All the links in the footer should remain intact.
									You can delete the links only if you purchased the pro version.
									Licensing information: https://bootstrapmade.com/license/
									Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
									-->
								Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</section>
	<!--/ Section Contact-footer End /-->
	
	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
	<div id="preloader"></div>
	
	<!-- JavaScript Libraries -->
	<script src="{{ asset('/devfolio/lib/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('/devfolio/lib/popper/popper.min.js') }}"></script>
	<script src="{{ asset('/devfolio/lib/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/devfolio/lib/easing/easing.min.js') }}"></script>
	<script src="{{ asset('/devfolio/lib/counterup/jquery.counterup.js') }}"></script>
	<script src="{{ asset('/devfolio/lib/owlcarousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/devfolio/lib/typed/typed.min.js') }}"></script>
	<!-- Contact Form JavaScript File -->
	<script src="{{ asset('/devfolio/contactform/contactform.js') }}"></script>
	
	<!-- Template Main Javascript File -->
	<script src="{{ asset('/devfolio/js/main.js') }}"></script>

</body>
</html>