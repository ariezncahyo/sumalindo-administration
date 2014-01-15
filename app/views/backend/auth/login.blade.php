@extends('backend._templates.login')

@section('panel')
<h2>Halaman Login</h2>
{{ Form::open(['class'=>'padTop']) }}

    <!-- check for login errors flash var -->
    @if (Session::has('login_errors'))
        <div class="alertMsg danger">
            <span><i class='fa fa-times-circle'></i></span> Nama pengguna dan kata sandi yg Anda masukkan bermasalah.<a class="alert-close" href="#">x</a>
        </div>
    @endif

    <!-- username field -->
    <div class="form-group">
        {{ Form::label('username', 'Nama Pengguna') }}
        {{ Form::text('username', NULL, ['class'=>'form-control']) }}
    </div>
    
    <!-- password field -->
    <div class="form-group">
        {{ Form::label('password', 'Kata Sandi') }}
        {{ Form::password('password', ['class'=>'form-control']) }}
    </div>

    <!-- submit button -->
    <button type="input" name="submit" class="btn btn-warning btn-icon"><i class="fa fa-sign-in"></i> Masuk</button>

{{ Form::close() }}
@stop