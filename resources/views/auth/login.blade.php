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
					<!-- <li class="nav-item">
						<a class="nav-link js-scroll" href="#about">About</a>
					</li> -->
					<!-- <li class="nav-item">
						<a class="nav-link js-scroll" href="#service">Services</a>
					</li> -->
					<!-- <li class="nav-item">
						<a class="nav-link js-scroll" href="#work">Work</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link js-scroll {{url('/blog') == request()->url() ? 'active' : ''}}" href="{{ url('/blog') }}">Blog</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link js-scroll" href="#contact">Contact</a>
					</li> -->
					@guest
						<li class="nav-item">
							<a class="nav-link js-scroll {{url('/login') == request()->url() ? 'active' : ''}}" href="{{ route('login') }}">Login</a>
						</li>
					@else
						<li class="nav-item dropdown">
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
	<div id="home" class="intro bg-image" style="background-image: url(devfolio/img/overlay-bg.jpg)">
		<div class="overlay-mf"></div>
		<div class="intro-content display-table">
			<div class="table-cell">
				<div class="container">
					<form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 offset-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>
                            </div>
						</div>
                    </form>
					<div class="form-group">
						<div class="col-md-10">
							<a href="{{ url('auth/google') }}"><button class="btn btn-danger"><i class="fa fa-google">&nbsp;</i>Login with Google</button></a>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10">
							<a href="{{ url('auth/facebook') }}"><button class="btn btn-primary"><i class="fa fa-facebook">&nbsp;</i>Login with Facebook</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Section -->
	
	
	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
	<div id="preloader"></div>
	
	<!-- JavaScript Libraries -->
	<script src="{{ asset('/devfolio/lib/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset('/devfolio/lib/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('/devfolio/lib/counterup/jquery.counterup.js')}}"></script>
	<script src="{{ asset('/devfolio/lib/owlcarousel/owl.carousel.min.js')}}"></script>
	<!-- Contact Form JavaScript File -->
	<script src="{{ asset('/devfolio/contactform/contactform.js')}}"></script>
	
	<!-- Template Main Javascript File -->
	<script src="{{ asset('/devfolio/js/main.js')}}"></script>

</body>
</html>