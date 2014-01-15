@extends('backend._templates.default')

@section('konten')
<h3 class="warning">Email Sumalindo</h3>

@if( $errors->count() > 0 )
<div class="alertMsg danger">
	<p>Terjadi masalah dalam input:</p>
	<ul id="form-errors">
		{{ $errors->first('nama', '<li>:message</li>') }}
		{{ $errors->first('divisi', '<li>:message</li>') }}
		{{ $errors->first('email', '<li>:message</li>') }}
	</ul>
</div>
@endif

@if(Session::has('success'))
<div class="alertMsg success">
	<span><i class="fa fa-check-square-o"></i></span> {{ Session::get('success') }}
	<a class="alert-close" href="#">x</a>
</div>
@endif

<div class="row">
	<div class="col-md-8">
		<p class="lead">Email-email berikut nantinya akan muncul di halaman frontend :</p>
	</div>
	<div class="col-md-4">
		<a data-toggle="modal" href="#newLaporan" class="btn btn-warning btn-icon floatRight"><i class="fa fa-upload"></i> Tambah Email</a>
	</div>
</div>

@if($it->count())
<table id="responsiveTable" class="large-only" cellspacing="0">
	<tbody>
		<tr>
			<th width="40%">Nama</th>
			<th>Divisi</th>
			<th>Email</th>
			<th></th>
		</tr>
		@foreach($it as $temp)
		<tr>
			<td>{{ $temp->nama }}</td>
			<td>{{ $temp->divisi }}</td>
			<td><a href="mailto:{{ $temp->email }}">{{ $temp->email }}</a></td>
			<td class="tool-tip" title="Hapus Email">
				<a href="{{ route('hapusemail', $temp->id) }}" onclick="if(!confirm('Anda yakin akan menghapus file ini?')){return false;};" title="Hapus File"><i class="fa fa-times"></i></a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>
@else
<div class="alertMsg default">
	<i class="fa fa-minus-square-o"></i> Anda belum memiliki email satupun.	
</div>
@endif

<!-- MODAL TAMBAH LAPORAN -->
<div class="modal fade" id="newLaporan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-warning">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title">Tambah Email Baru</h4>
			</div>
			{{ Form::open(['route'=>'emailbaru', 'POST', 'autocomplete'=>'off', 'files'=>'true']) }}\
			{{ Form::token() }}
				<div class="modal-body">
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('nama', 'Nama') }}
						</h3>
						{{ Form::text('nama', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Nama pemegang email.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('divisi', 'Divisi') }}
						</h3>
						{{ Form::text('divisi', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Nama Divisi pemegang email.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('email', 'Email') }}
						</h3>
						{{ Form::text('email', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Nama Email.</span>
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

@stop