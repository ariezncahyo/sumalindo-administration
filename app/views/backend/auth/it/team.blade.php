@extends('backend._templates.default')

@section('konten')
<h3 class="warning">IT Team Member</h3>

@if( $errors->count() > 0 )
<div class="alertMsg danger">
	<p>Terjadi masalah dalam input:</p>
	<ul id="form-errors">
		{{ $errors->first('nama', '<li>:message</li>') }}
		{{ $errors->first('nip', '<li>:message</li>') }}
		{{ $errors->first('jabatan', '<li>:message</li>') }}
		{{ $errors->first('status', '<li>:message</li>') }}
		{{ $errors->first('email', '<li>:message</li>') }}
		{{ $errors->first('telp', '<li>:message</li>') }}
		{{ $errors->first('photo', '<li>:message</li>') }}
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
		<p class="lead">Daftar Member IT Team :</p>
	</div>
	<div class="col-md-4">
		<a data-toggle="modal" href="#newLaporan" class="btn btn-warning btn-icon floatRight"><i class="fa fa-upload"></i> Tambah Member</a>
	</div>
</div>
<hr/>
<div class="row">
	@if($it->count())
	@foreach($it as $temp)
	<div class="col-md-6">
		<div class="col-md-5">
			<a href="{{ asset('files/it/avatar') }}/{{ $temp->photo }}" target="_blank"><img src="{{ asset('files/it/avatar') }}/{{ $temp->photo }}" style="width:250px;height:250px;"></a>
		</div>
		<div class="col-md-7">
			<div class="col-md-10 tool-tip" title="Nama Member">
				<h3 class="warning">{{ $temp->nama }}</h3>
			</div>
			<div class="col-md-2 tool-tip" title="Hapus Member" style="margin-top:15px;">
				<a href="{{ route('hapusteam', $temp->id) }}" onclick="if(!confirm('Anda yakin akan menghapus member ini?')){return false;};" title="Hapus File" class="close"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="col-md-7 tool-tip" title="Nomor Induk Pegawai" style="padding-left:30px;">
			<i class="fa fa-user"></i> {{ $temp->nip }}
		</div>
		<div class="col-md-7 tool-tip" title="Jabatan" style="padding-left:30px;">
			<i class="fa fa-tag"></i> {{ $temp->jabatan }}
		</div>
		<div class="col-md-7 tool-tip" title="Status" style="padding-left:30px;">
			<i class="fa fa-archive"></i> {{ $temp->status }}
		</div>
		<div class="col-md-7 tool-tip" title="Email" style="padding-left:30px;">
			<i class="fa fa-envelope"></i> <a href="mailto:{{ $temp->email }}">{{ $temp->email }}</a>
		</div>
		<div class="col-md-7 tool-tip" title="Nomor Telpon" style="padding-left:30px;">
			<i class="fa fa-phone"></i> {{ $temp->telp }}
			<br/>
		</div>
	</div>

	@endforeach
	@else
	<div class="alertMsg default">
		<i class="fa fa-minus-square-o"></i> Anda belum memiliki email satupun.	
	</div>
	@endif
</div>


<!-- MODAL TAMBAH LAPORAN -->
<div class="modal fade" id="newLaporan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-warning">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title">Tambah Member IT Baru</h4>
			</div>
			{{ Form::open(['route'=>'teambaru', 'POST', 'autocomplete'=>'off', 'files'=>'true']) }}\
			{{ Form::token() }}
				<div class="modal-body">
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('nip', 'Nip') }}
						</h3>
						{{ Form::text('nip', NULL, ['class'=>'form-control']) }}
						<span class="help-block">NIP member IT.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('nama', 'Nama') }}
						</h3>
						{{ Form::text('nama', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Nama member IT.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('jabatan', 'Jabatan') }}
						</h3>
						{{ Form::text('jabatan', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Jabatan member.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('status', 'Status') }}
						</h3>
						{{ Form::text('status', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Status member.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('email', 'Email') }}
						</h3>
						{{ Form::text('email', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Email member.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('telp', 'Telepon') }}
						</h3>
						{{ Form::text('telp', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Nomor telepon member yang bisa dihubungi.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('photo', 'Pilih photo yg ingin ditampilkan') }}
						</h3>
						{{ Form::file('photo') }}
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