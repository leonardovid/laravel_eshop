@extends('layout.main')

@section('contenido')

<!-- resources/views/auth/register.blade.php -->
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
		<form method="POST" action="/auth/register">
		    {!! csrf_field() !!}

		    <div>
		        Nombre
		        <input class="field" type="text" name="name" value="{{ old('name') }}"><span>Campo vacio</span>
		    </div>

		    <div>
		        Apellido
		        <input class="field" name="apellido" value="{{ old('apellido') }}"><span>Campo vacio</span>
		    </div>

		    <div>
		        Email
		        <input id="email" type="email" name="email" value="{{ old('email') }}"><span>No es un email valido</span>
		    </div>
		    	<div>
		        Codigo Postal
		        <input class="field" type="text" name="codigopostal" value="{{ old('codigopostal') }}"><span>Campo vacio</span>
		    </div>
		    <div>
		        Direccion
		        <input  class="field"  type="text" name="direccion" value="{{ old('direccion') }}"><span>Campo vacio</span>
		    </div>
		    <div>
		        Contraseña
		        <input id="password" type="password" name="password"><span>Necesita al menos 8 caracteres</span>
		    </div>

		    <div>
		        Confirmar Contraseña
		        <input id="password_confirmation" type="password" name="password_confirmation"><span>La contraseña no es la misma</span>
		    </div>

		    <div>
		        <button id="button" type="submit">Registrarme</button>
		    </div>
		</form>
	</div>
</div>
@section('scripts')
<script src="{{ asset('js/register-validations.js') }}" type="text/javascript" charset="utf-8"></script>
@stop
@stop