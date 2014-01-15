@extends('backend._templates.default')

@section('konten')

@if( $errors->count() > 0 )
<div class="alertMsg danger">
	<p>Terjadi masalah dalam input:</p>
	<ul id="form-errors">
		{{ $errors->first('username', '<li>:message</li>') }}
		{{ $errors->first('password', '<li>:message</li>') }}
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
		<h3 class="warning">Akun &amp; Profil</h3>		
		<p class="lead">
		@if( Auth::user()->id != 6)
			<img alt="Avatar" src="{{ asset('assets/img/user.png') }}" class="avatar" />
        @else
        	<img alt="Avatar" src="{{ asset('assets/img/admin.png') }}" class="avatar" />
        @endif
			{{ Auth::user()->display_name }}<br />
			<h5>{{ Auth::user()->email }}</h5>
		</p>
		<p><small class="light">Update akun Anda jika ada perubahan segera.</small></p>
	</div>

	<div class="col-md-4">
        <div class="list-group">
			<li class="list-group-item active">Informasi Akun per Divisi</li>
			<a data-toggle="modal" href="#ubahPassword" class="list-group-item">Ubah Kata Sandi</a>
        </div>
	</div>
</div>

<h3 class="warning">Informasi Akun Anda terlindungi.</h3>
<p>Saya meng<strong>enkripsi</strong> seluruh informasi akun Anda sebelum akhirnya meletakkannya ke dalam database dan saya tidak akan menjual ataupun menyebarluaskan informasi yang Ada kepada siapapun dan untuk alasan apapun. Saya sangat menghargai privasi Informasi perusahaan Anda sebagai timbal balik karena Anda mempercayakan seluruh pembuatannya kepada saya. Anda bisa melakukan perubahan informasi akun Anda dengan mudah melalui panel sidebar yang tersedia.</p>

<!-- -- Update Account Password Model -- -->
<div class="modal fade" id="ubahPassword" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-warning">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title">Ubah kata sandi Anda</h4>
			</div>
			{{ Form::model($user, ['route' => ['ubahprofil', $user->id], 'method' => 'PUT', 'autocomplete'=>'off']) }}
			{{ Form::token() }}
				<div class="modal-body">
                    <div class="form-group">
                    	<h3 class="warning">
	                        {{ Form::label('username', 'Nama Pengguna') }}
	                    </h3>
	                    {{ Form::text('username', Auth::user()->username, ['class'=>'form-control'] ) }}
						<span class="help-block">Ubah jika ingin melakukan perubahan nama pengguna ketika login.</span>
                    </div>
                    <div class="form-group">
                    	<h3 class="warning">
	                        {{ Form::label('password', 'Kata Sandi Baru') }}
	                    </h3>
	                    {{ Form::password('password', ['class'=>'form-control']) }}
						<span class="help-block">Ketikkan kata sandi baru Anda.</span>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="input" name="submit" value="updatePass" class="btn btn-success btn-icon"><i class="fa fa-check-square-o"></i> Ubah</button>
					<button type="button" class="btn btn-warning btn-icon" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop