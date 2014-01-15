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

    <!-- LIST SOP -->
    <div class="bs-example" align="left">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>File Laporan</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach($laporan as $temp)
          <tr>
            <td>{{ $temp->id }}</td>
            <td>{{ $temp->nama }}</td>
            <td><a href="{{ asset('files/it/infrastruktur') }}/{{ $temp->file_document_infrastruktur }}">{{ $temp->file_document_infrastruktur }}</a></td>
            <td>{{ $temp->keterangan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div><!-- /.container -->

@stop