@extends('backend._templates.default')

@section('konten')
<h2>Struktur {{ Auth::user()->display_name }}</h2>
<p class="lead">Ubah sesuai dengan informasi divisi Anda.</p>

@if( $errors->count() > 0 )
<div class="alertMsg danger">
	<p>Terjadi masalah dalam input:</p>
	<ul id="form-errors">
		{{ $errors->first('keterangan', '<li>:message</li>') }}
		{{ $errors->first('foto', '<li>:message</li>') }}
	</ul>
</div>
@endif

@if(Session::has('success'))
<div class="alertMsg success">
	<span><i class="fa fa-check-square-o"></i></span> {{ Session::get('success') }}
	<a class="alert-close" href="#">x</a>
</div>
@endif

<div class="content">
{{ Form::model($struktur, ['route' => ['ubahstruktur', $struktur->id], 'method' => 'PUT', 'autocomplete'=>'off', 'files'=>'true']) }}
{{ Form::token() }}
<form action="" method="post" class="padTop">
	<div class="form-group">
		<h3 class="warning">
			{{ Form::label('keterangan', 'Keterangan') }}
		</h3>
		{{ Form::textarea('keterangan', $struktur->keterangan, ['class'=>'form-control', 'rows'=>'5']) }}
	</div>

	<div class="form-group">
		<h3 class="warning">
			{{ Form::label('foto', 'Struktur Organisasi Sekarang') }}
		</h3>
		<div class="gallery">
			<a data-toggle="modal" href="#struktur"><img src="{{ $gambar }}{{ $struktur->foto }}"/></a>
			<!-- Model Gambar Struktur -->
			<div class="modal fade" id="struktur" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header picture">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
							<center><strong>Struktur Organisasi {{ Auth::user()->display_name }}</strong></center>
						</div>
						<div class="modal-body">
							<center>
								<img src="{{ $gambar }}{{ $struktur->foto }}" />
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br/>
		<br/>
		<br/>
		<h3 class="warning">
			Ubah Struktur Organisasi
		</h3>
		<input type="file" id="foto" name="foto" value="{{ $struktur->foto }}">
		<span class="help-block">*Upload ulang foto yang akan digunakan.</span>
		<br/>
		
		
	</div>
	<button type="input" name="submit" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> Ubah</button>
{{ Form::close() }}
</div>

@stop