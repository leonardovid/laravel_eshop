@extends('panel.panel-main')

@section('contenido-panel')

@if($pedido->estado=="En preparacion")
	<form method="POST" action="{{ action('PedidosController@save',[$pedido->id]) }}" accept-charset="UTF-8" enctype="multipart/form-data" data-abide>
		<ul class="pricing-table producto">
		  <input type="hidden" name="_method" value="PUT" />
		  <input type="hidden" name="_token" value="{{ csrf_token() }}">
		  <li class="title"> ID: {{$pedido->id}} </li>
		  <li class="bullet-item"> <input type="text" name="codigo" placeholder='Codigo de seguimiento' required pattern="[a-zA-Z0-9\s]+" /></li>
		  
		  <li class="cta-button"><input class="button" type="submit" value="Actualizar"></li>
		  
		</ul>		
	</form>
@elseif($pedido->estado=="En camino")
	<form method="POST" action="{{ action('PedidosController@save',[$pedido->id]) }}" accept-charset="UTF-8" enctype="multipart/form-data" data-abide>
		<ul class="pricing-table producto">
		  <input type="hidden" name="_method" value="PUT" />
		  <input type="hidden" name="_token" value="{{ csrf_token() }}">
		  <li class="title"> ID: {{$pedido->id}} </li>
		  <li class="bullet-item"> 		  
		  <select name="estado" required>
		  	<option selected disabled>¿El usuario recibio el pedido?</option>
		  	<option value="Recibido">Recibido</option>
		  	<option value="No Recibido">No Recibido</option>
		  </select>
		  </li>
		  
		  <li class="cta-button"><input class="button" type="submit" value="Actualizar"></li>
		  
		</ul>		
	</form>
@else

	<ul class="pricing-table producto">
		<li class="bullet-item">No hay opciones para este pedido</li>
	</ul>
@endif

@stop