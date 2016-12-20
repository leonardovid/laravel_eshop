<?php 
use App\Pedidos;

if ($seleccionado=='espera') {
	$pedidos=Pedidos::where('user_id',Auth::user()->id)->where('estado','!=','Recibido')->get();
}
else{
	$pedidos=Pedidos::where('user_id',Auth::user()->id)->where('estado','Recibido')->get();
}

 ?>
@extends('layout.main')

@section('contenido')

<div class=" categoria animsition">
	<div class="text-center" >
		<h1 class="carrito-titulo">{{Auth::user()->name." ".Auth::user()->apellido}}</h1>
		
	</div>
	<div class="menu-cuenta ">
		<table class="large-offset-2 ">
			<tr><th width="758" class="text-center">PEDIDOS</th></tr>
		</table >
		<table class="large-offset-2">
			<tr>
			@if($seleccionado=="espera")
			<?php 
				$selecionadoEnEspera="menu-seleccionado";
				$selecionadoRecibidos="";
			 ?>
			 @else
			 <?php 
				$selecionadoEnEspera="";
				$selecionadoRecibidos="menu-seleccionado";
			 ?>
			 @endif
			<th width="378" class="text-center {{$selecionadoEnEspera}} grey-hover"><a href="{{ action('TiendaController@cuenta') }}"> EN ESPERA</a></th>
			<th width="378" class="text-center {{$selecionadoRecibidos}} grey-hover"><a href="{{ action('TiendaController@cuentaRecibidos') }}"> RECIBIDOS</a></th>
			</tr>
		</table>
	</div>
	<table class="large-offset-2 margin">
	  <thead>
	    <tr>
	      <th width="150">Fecha</th>
	      <th width="100">Subtotal</th>
	      <th width="100">Envio</th>
	      <th width="100">Total</th>
	      <th width="150">Seguimiento</th>
	      <th width="150">Estado</th>
	      
	    </tr>
	  </thead>
	  <tbody>
	  
	  		@foreach($pedidos as $pedido)
	  			<?php $date=strtotime($pedido->updated_at) ?>
	  			
			    <tr>
			      <td >{{date("d-m-Y",$date)}}</td>
			      <td>{{ $pedido->subtotal }}</td>
			      <td>{{ $pedido->envio }}</td>
			      <td >{{ $pedido->subtotal+ $pedido->envio }}</td>
			      <td>{{ $pedido->codSeguimiento }}</td>
			      <td>{{ $pedido->estado }}</td>
			    </tr>
			   
		    @endforeach
		 
	  </tbody>
	</table>
		<div class="text-center">
			<a href="{{ action('Auth\AuthController@getLogout') }}" class="button  alert round "><i class="fi-power" ></i>
			Cerrar Sesion</a>
		</div>
</div>
@stop