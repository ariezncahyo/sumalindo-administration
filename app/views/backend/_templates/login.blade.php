<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Judul
		================================================== -->
		<title>Sumalindo | Login Page</title>

		<!-- CSS
		================================================== -->
		

		{{ HTML::style('assets/css/bootstrap.css') }}
		{{ HTML::style('assets/css/custom.css') }}
		{{ HTML::style('assets/css/reside.css') }}
		{{ HTML::style('assets/css/datepicker.css') }}
		{{ HTML::style('assets/css/font-awesome.min.css') }}

		@yield('style')

  	</head>

	<body>
		<div class="container">
			
			<div class="row">
				<div class="col-md-8">
					<div class="logo">
						<a href="{{ route('admin') }}"><img alt="Sumalindo Administration" src="{{ asset('assets/img/logo.png') }}" /></a>
					</div>
				</div>
			</div>

			<div class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					</button>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="">{{ date('l') }}, {{ date('j F Y') }}</a></li>
					</ul>
				</div>
			</div>

			<!-- Panel Username -->
			<div class="content">
				@yield('panel')
			</div> <!-- Akhir dari Panel Username -->

			<!-- Footer -->
			<div class="footer">
				<p class="textCenter">&copy; 2014 <a href="#">SLJ Global, Tbk Company, Inc.</a>
					<span><i class="fa fa-minus"></i></span>
					Developed by <a href="http://about.me/novay" target="_blank">novay</a>
				</p>
			</div> <!-- Akhir dari Footer -->

		</div>

	    <!-- Javascript
	    ================================================== -->
	    {{ HTML::script('assets/js/jquery.js') }}
	    {{ HTML::script('assets/js/bootstrap.js') }}
	    {{ HTML::script('assets/js/reside.js') }}
	    {{ HTML::script('assets/js/stacktable.js') }}
	    {{ HTML::script('assets/js/datePicker.js') }}

	    @yield('script')

  	</body>
</html>