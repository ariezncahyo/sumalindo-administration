<!DOCTYPE html>
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Judul
    ================================================== -->
    <title>Sumalindo | Administration</title>

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
			<div class="col-md-4 userInfo">
				<p class="textRight">
					{{ date('l') }}, {{ date('j F Y') }}
					<br/>
					Selamat datang, {{ Auth::user()->display_name }} -<span class="paddingLeft"><a data-toggle="modal" href="#signOut">LogOut <i class="fa fa-sign-out"></i></a></span>	
				</p>
			</div>
		</div>

		<div class="navbar navbar-default">

			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{ route('admin') }}">Beranda</a></li>
					<li><a href="{{ route('sop') }}">S.O.P</a></li>
					<li><a href="{{ route('laporan') }}">Laporan</a></li>
					@if( Auth::user()->id != 6)
					@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dokumen <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('ifs') }}">Dokumen IFS</a></li>
							<li><a href="{{ route('nonifs') }}">Dokumen Non-IFS</a></li>
							<li><a href="{{ route('infrastruktur') }}">Dokumen Infrastruktur</a></li>
						</ul>
					</li>
					<li><a href="{{ route('software') }}">Software</a></li>
					<li><a href="{{ route('team') }}">Team IT</a></li>
					@endif
					<li><a href="{{ route('struktur') }}">Struktur</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
				<li><a data-toggle="modal" href="#newBerita">Berita</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> <b class="caret"></b></a>
						<ul class="dropdown-menu">
						@if( Auth::user()->id != 6)
							<li><a href="{{ route('profil') }}">Profil {{ Auth::user()->display_name }}</a></li>
						@else
							<li><a href="{{ route('backendemail') }}">Email per Divisi</a></li>
							<li><a href="{{ route('profil') }}">Profil Admin</a></li>
						@endif
						</ul>
					</li>
				</ul>
			</div>
		</div>

	<!-- KOLEKSI MODEL PADA SITUS -->

	<!-- MODAL TAMBAH Berita -->
<div class="modal fade" id="newBerita" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-warning">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title">Tambah Berita Anda</h4>
			</div>
			{{ Form::open(['route'=>'beritabaru', 'POST', 'autocomplete'=>'off', 'files'=>'true']) }}\
			{{ Form::token() }}
				<div class="modal-body">
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('judul', 'Judul') }}
						</h3>
						{{ Form::text('judul', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Judul Berita.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">		
							{{ Form::label('isi_berita', 'Isi Berita') }}
						</h3>
						{{ Form::textarea('isi_berita', NULL, ['class'=>'form-control',  'rows'=>'2']) }}
						<span class="help-block">Masukkan isi berita yang ingin ditampilkan. <strong>*Optional</strong>.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('gambar', 'Pilih Gambar Yang Anda Inginkan') }}
						</h3>
						{{ Form::file('gambar') }}
					</div>
				</div>
				<div class="modal-footer">
					<button type="input" name="submit" value="New Tenant" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> Tambah</button>
					<button type="button" class="btn btn-warning btn-icon" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

		<!-- SIGN OUT MODEL -->
		<div class="modal fade" id="signOut" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<p class="lead">Untuk {{ Auth::user()->display_name }}, apa Anda yakin ingin keluar?</p>
					</div>
					<div class="modal-footer">
						<a href="{{ route('logout') }}" class="btn btn-success btn-icon-alt">Yakin <i class="fa fa-sign-out"></i></a>
						<button type="button" class="btn btn-warning btn-icon" data-dismiss="modal"><i class="fa fa-times-circle"></i> Tidak</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="content">
			
			@yield('konten')

		</div>

		<div class="footer" style="margin-top:-20px;float:right;">
			<p class="textCenter">
				<span><i class="fa fa-minus"></i></span>
				&copy; {{ date('Y') }} <a href="#">SLJ Global, Tbk Company, Inc.</a>
				<span><i class="fa fa-plus"></i></span>
				Developed by <a href="https://www.novay.web.id/" target="_blank">Noviyanto Rachmady</a>
				<span><i class="fa fa-minus"></i></span>
			</p>
		</div>

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