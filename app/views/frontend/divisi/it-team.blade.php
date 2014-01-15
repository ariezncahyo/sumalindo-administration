@extends('frontend._templates.divisi')

{{-- Judul Website --}}
@section('title')
  {{{ $judul }}}
@stop

@section('konten')

  <!-- Tabs -->
  <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container">
      <a href="{{ route('it') }}" class="navbar-brand"><i class="glyphicon glyphicon-home"></i></a> <a href="#" class="navbar-brand">{{{ $judul }}}</a>
    </div>
  </div>
     
  <!-- START THE FEATURES -->
  <div class="container" style="margin-top:70px" align="center">

  	@if ($team->count())

    <!-- LIST SOP -->
    <div class="bs-example" align="left">
      <table class="table table-hover">
        <thead>
          <tr>
            <th width="20%">TEAM</th>
            <th></th>
          </tr>
        </thead>
        @foreach($team as $temp)
        <tbody>
		<tr>
			<td rowspan="5"><a href="{{ asset('files/it/avatar') }}/{{ $temp->photo }}" target="_blank"><img src="{{ asset('files/it/avatar') }}/{{ $temp->photo }}" style="width:200px;height:200px;"></a></td>
			<td width="10%">NIP</td>
			<td width="1%">:</td>
			<td>{{ $temp->nip }}</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{ $temp->nama }}</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>{{ $temp->jabatan }}</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>:</td>
			<td>{{ $temp->telp }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td>{{ $temp->email }}</td>
		</tr>
        </tbody>
        @endforeach
      </table>
    </div>

  </div><!-- /.container -->

  @else
	
	<center>Masih kosong.</center>
	<hr/>

  @endif  

@stop