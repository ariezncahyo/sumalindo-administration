@extends('backend._templates.default')

@section('konten')
<div class="row">
	<div class="col-md-6">

		@if( Auth::user()->id != 6)
			<img alt="User Avatar" src="{{ asset('assets/img/user.png') }}" class="avatar" />
        @else
        	<img alt="Admin Avatar" src="{{ asset('assets/img/admin.png') }}" class="avatar" />
        @endif
		
		<p class="lead welcomeMsg">Selamat Datang, {{ Auth::user()->display_name }}</p>
		<p><b>Sumalindo Administration</b> is allows you to view/update information & details relating to your needs.</p>
	</div>
	<div class="col-md-6"></div>
</div>

<h3 class="success">Berita Terakhir dari Anda</h3>
@if( $errors->count() > 0 )
<div class="alertMsg danger">
	<p>Terjadi masalah dalam input:</p>
	<ul id="form-errors">
		{{ $errors->first('judul', '<li>:message</li>') }}
		{{ $errors->first('isi_berita', '<li>:message</li>') }}
		{{ $errors->first('gambar', '<li>:message</li>') }}
	</ul>
</div>
@endif

@if(Session::has('success'))
<div class="alertMsg success">
	<span><i class="fa fa-check-square-o"></i></span> {{ Session::get('success') }}
	<a class="alert-close" href="#">x</a>
</div>
@endif

@if($berita->count())
<table id="responsiveTable" class="large-only" cellspacing="0">
	<tbody>
		<tr>
			<th>Tanggal Buat</th>
			<th>Judul</th>
			<th>Isi Berita</th>
			<th>Divisi</th>
			<th></th>
		</tr>
		@if(Auth::user()->id==6)
		@foreach($berita as $temp)
		<tr>
			<td>{{ date("j F Y", strtotime($temp->created_at)) }}</td>
			<td>{{ $temp->judul }}</td>
			<td>{{ $temp->isi_berita }}</td>
			<td>{{ ucfirst($temp->User->display_name) }}</td>
			<td class="tool-tip" title="Hapus File">
				<a href="{{ route('hapusberita', $temp->id) }}" onclick="if(!confirm('Anda yakin akan menghapus file ini?')){return false;};" title="Hapus File"><i class="fa fa-times"></i></a>
			</td>
		</tr>
		@endforeach
		@else
		@foreach($berita as $temp)
		<tr>
			<td>{{ date("j F Y", strtotime($temp->created_at)) }}</td>
			<td>{{ $temp->judul }}</td>
			<td>{{ $temp->isi_berita }}</td>
			<td>{{ ucfirst($temp->User->display_name) }}</td>
			@if( Auth::user()->id == $temp->id_user )
			<td class="tool-tip" title="Hapus File">
				<a href="{{ route('hapusberita', $temp->id) }}" onclick="if(!confirm('Anda yakin akan menghapus file ini?')){return false;};" title="Hapus File"><i class="fa fa-times"></i></a>
			</td>
			@else
				<td class="tool-tip" title="Bukan">
					<a href="#" title="Bukan">Bukan Milik Divisi Anda.</a>
				</td>
			@endif
		</tr>
		@endforeach
		@endif
	</tbody>
</table>
@else
<div class="alertMsg default">
	<i class="fa fa-minus-square-o"></i> Anda belum memiliki postingan berita.	
</div>
@endif
@stop