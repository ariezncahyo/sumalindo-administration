@extends('frontend._templates.divisi')

{{-- Judul Website --}}
@section('title')
  {{{ $judul }}}
@stop

@section('konten')
  
  <!-- Tabs -->
  <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container">
      <a href="#" class="navbar-brand">{{{ $judul }}}</a>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{ route ('home') }}">Home SLJ</a></li>
          <li><a href="{{ route('itteam') }}">Team IT</a></li>
          <li><a href="#">Master Plan</a></li>
        </ul>
      </div>
    </div>
  </div>
    
     
  <!-- START THE FEATURES -->
  <div class="container" style="margin-top:100px" align="center">

    <div class="row">
      <div class="col-lg-4">
        <img src="{{ asset('addon/images/6205b8d9a.png') }}" />
        <h2>Software</h2>
        <a href="{{ route('itsoftware') }}" class="btn btn-info btn-xs">List Software</a>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4" >
        <img src="{{ asset('addon/img/Expert-IT-Support-Advice-300x300.jpg') }}" />
        <h2>IT Suport</h2>
        <button type="button" class="btn btn-default  btn-xs">Monitoring & Hardware Populasi</button>  
        <button type="button" class="btn btn-default  btn-xs">Aplikasi</button> <br>  
        <button type="button" class="btn btn-default  btn-xs">Akses Internet</button>  
        <button type="button" class="btn btn-default  btn-xs">Peminjaman</button>  
        <button type="button" class="btn btn-default  btn-xs">Email</button>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="{{ asset('addon/images/6205b18d9a.png') }}" />
        <h2>Dokumen</h2>
        <a href="{{ route('itifs') }}" class="btn btn-primary btn-xs">IFS</a>
        <a href="{{ route('itnonifs') }}" class="btn btn-primary btn-xs">Non IFS</a>
        <a href="{{ route('itinfrastruktur') }}" class="btn btn-primary btn-xs">Infrastruktur</a>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <hr class="featurette-divider">
    @foreach ($struktur as $temp)
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Struktur Karyawan <span class="text-muted">Departement IT.</span></h2>
        <p class="lead">{{ $temp->keterangan }}</p>
      </div>
      <div class="col-md-5">
        <a href="{{ asset('addon/images') }}/{{ $temp->foto }}" target="_blank"><img src="{{ asset('addon/images') }}/{{ $temp->foto }}" class="img-responsive"/></a>
      </div>
    </div>
    @endforeach
    <hr class="featurette-divider"/>

    <!-- Default panel visi misi -->
    <div class="row featurette">
      <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">Visi dan Misi</div>
              <ul class="list-group">
                <li class="list-group-item"><h3><b>Visi</b></h3>Perusahaan menjadi perusahaan teknologi informasi yang mampu mendorong kemajuan industri telekomunikasi dan pengembangan sumber daya manusia indonesia.</li>
                <li class="list-group-item"><h3><b>Misi</b></h3> 
                  <ul>
                      <li>Perusahaan merupakan perusahaan yang bergerak dalam bidang Teknologi Informasi yang berskala Nasional. Untuk menggapai visi perusahaan JL Cyber mengembangkan divisi divisi bisnis.</li>
                      <li>Perusahaan dalam mengembangkan divisi Internet Service Provider yang menyediakan jasa backbone internet dengan teknologi WiFi(Wireless), yang kemudian dikenal dengan nama DR-NET berupaya menjadi yang terdepan dalam menyediakan layanan berbasis teknologi ini.</li>
                      <li>Perusahaan berupaya mengembangkan seluruh divisi yang dimilikinya untuk bisa menjadi perusahaan dibidang teknologi informasi yang handal, terpercaya dan memiliki integritas tinggi dalam pelayanan.</li>
                  </ul>
                </li>
              </ul>
          </div>
      </div>
      <div class="col-md-7" >
        <h2 class="featurette-heading">Visi dan Misi <span class="text-muted">Departemen IT.</span></h2>
        <p class="lead">Visi  dan Misi sering dipandang sebagai hal yang abstrak, sehingga seolah tidak bermakna. bahkan kadang hanya sebuah pajangan didinding yang tidak punya pengaruh apa-apa. Padahal kalau kita simak dengan seksama banyak sekali yang terkandung dalam sebuh VISI Dan MISI. <img src="../addon/images/rsz_istock_000007836760large.png" / class="img-responsive"></p>
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- LIST SOP -->
    <div class="bs-example" align="left">
      <h1>Daftar S.O.P</h1>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>File S.O.P</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sop as $temp)
          <tr>
            <td>{{ $temp->id }}</td>
            <td>{{ $temp->nama }}</td>
            <td><a href="{{ asset('files/it/sop') }}/{{ $temp->file_sop }}">{{ $temp->file_sop }}</a></td>
            <td>{{ $temp->keterangan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('itsop') }}" class="btn btn-info pull-right" >Read More...</a>
    </div>

    <hr class="featurette-divider">

    <!-- LIST LAPORAN -->
    <div class="bs-example" align="left">
      <h1>Daftar Laporan</h1>
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
              <td><a href="{{ asset('files/it/laporan') }}/{{ $temp->file_laporan }}">{{ $temp->file_laporan }}</a></td>
              <td>{{ $temp->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <a href="{{ route('itlaporan') }}" class="btn btn-info pull-right" >Read More...</a>
    </div>

    <hr class="featurette-divider" style="padding:20px;">
    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

@stop