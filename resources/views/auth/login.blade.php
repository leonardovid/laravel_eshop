@extends('layout.main')

@section('contenido')

<!-- resources/views/auth/login.blade.php -->
<div class="  text-center animsition" >
	<div class="auth categoria text-center">
	@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
	@endif
		<form method="POST" action="/auth/login">
		    {!! csrf_field() !!}

		    <div>
		        Email
		        <input type="email" name="email" value="{{ old('email') }}" 
		        oninvalid="setCustomValidity('Formato de email invalido ')"
		          onchange="try{setCustomValidity('')}catch(e){}" />
		    </div>

		    <div>
		        Password
		        <input type="password" name="password" id="password">
		    </div>

		    <div>
		        <input type="checkbox" name="remember"> Recuerdame
		    </div>

		    <div>
		        <button type="submit">Ingresar</button>
		        <a href="{{ action('Auth\AuthController@getRegister') }}" class="button">Registrarse</a>
		    </div>
		</form>
	</div>
</div>

@stop