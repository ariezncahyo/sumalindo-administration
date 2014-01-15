@extends('backend._templates.default')

@section('konten')
<h3 class="warning">File Laporan {{ Auth::user()->display_name }}</h3>

@if( $errors->count() > 0 )
<div class="alertMsg danger">
	<p>Terjadi masalah dalam input:</p>
	<ul id="form-errors">
		{{ $errors->first('nama', '<li>:message</li>') }}
		{{ $errors->first('keterangan', '<li>:message</li>') }}
		{{ $errors->first('file_laporan', '<li>:message</li>') }}
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
		<p class="lead">Berikut daftar file Laporan untuk {{ Auth::user()->display_name }} yang telah terunggah.</p>
	</div>
	<div class="col-md-4">
		<a data-toggle="modal" href="#newLaporan" class="btn btn-warning btn-icon floatRight"><i class="fa fa-upload"></i> Unggah File</a>
	</div>
</div>

@if($laporan->count())
<table id="responsiveTable" class="large-only" cellspacing="0">
	<tbody>
		<tr>
			<th width="15%">Tanggal Unggah</th>
			<th>Nama</th>
			<th>Keterangan</th>
			<th colspan="2" width="10%">Aksi</th>
		</tr>
		@foreach($laporan as $temp)
		<tr>
			<td>{{ date("j F Y", strtotime($temp->created_at)) }}</td>
			<td>{{ $temp->nama }}</td>
			<td>{{ $temp->keterangan }}</td>
			<td class="tool-tip" title="Download File">
				<a href="{{ $divisi }}{{ $temp->file_laporan }}"><i class="fa fa-download"></i></a>
			</td>
			<td class="tool-tip" title="Hapus File">
				<a href="{{ route('hapuslaporan', $temp->id) }}" onclick="if(!confirm('Anda yakin akan menghapus file ini?')){return false;};" title="Hapus File"><i class="fa fa-times"></i></a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>
@else
<div class="alertMsg default">
	<i class="fa fa-minus-square-o"></i> Anda belum memiliki file Laporan.	
</div>
@endif

<!-- MODAL TAMBAH LAPORAN -->
<div class="modal fade" id="newLaporan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-warning">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title">Tambah Laporan</h4>
			</div>
			{{ Form::open(['route'=>'laporanbaru', 'POST', 'autocomplete'=>'off', 'files'=>'true']) }}\
			{{ Form::token() }}
				<div class="modal-body">
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('nama', 'Nama') }}
						</h3>
						{{ Form::text('nama', NULL, ['class'=>'form-control']) }}
						<span class="help-block">Nama Laporan.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">		
							{{ Form::label('keterangan', 'Keterangan') }}
						</h3>
						{{ Form::textarea('keterangan', NULL, ['class'=>'form-control',  'rows'=>'2']) }}
						<span class="help-block">Masukkan keterangan file yang mungkin dibutuhkan. <strong>*Optional</strong>.</span>
					</div>
					<div class="form-group">
						<h3 class="warning">
							{{ Form::label('file_laporan', 'Pilih file yg ingin Anda Unggah') }}
						</h3>
						{{ Form::file('file_laporan') }}
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