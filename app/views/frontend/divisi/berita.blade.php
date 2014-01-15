<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Berita</title>
<link href="../addon/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../addon/css/unslider.css" rel="stylesheet" type="text/css" />

     
</head>

<body>

    <!-- Nav tabs -->
            <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
                    <div class="container">
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand">SLJ Departement</a>
                   </div>
                   <div class="navbar-collapse collapse">
                       
                   </div>
                </div>
              </div>
<div class="container" style="margin-top:40px">
@foreach($berita as $temp)
  <a href="{{ route('tampil-berita', $temp->alias) }}"><h3>{{ $temp->judul }}</h3></a>
  <h5>Diterbitkan {{ date("j F Y", strtotime($temp->created_at)) }} &bull; by {{ ucfirst($temp->User->display_name) }} </h5>
<hr/>
<p>  {{ Str::limit($temp->isi_berita, 50) }}... </p>

      <hr class="featurette-divider">
@endforeach
      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        
        <p>© 2013 SLJ Global, Tbk Company, Inc. · Privacy · Terms </p>
      </footer>

    </div><!-- /.container -->

    </div>  
      <script src="../addon/js/jquery-1.10.2.min.js"></script>
          <script type="text/javascript" src="../addon/js/bootstrap.js"></script>


</body>
</html>