<?php 
use App\PedidoItems;
use App\User;
$pedidoitems=PedidoItems::where('pedido_id',$pedido->id)->get();
$user=User::find($pedido->user_id);
 ?>

@extends('panel.panel-main')

@section('contenido-panel')
<table class="">
	  
	  <tbody>
	  	<tr>
	  		<th>DATOS DEL USUARIO:</th>
	  	</tr>
	  	<tr>
		      <td width="380">Usuario:</td>
		       <td width="380">{{ $user->name." ". $user->apellido }}</td>
	    </tr>
	    <tr>
	    	<td >Correo:</td>
	    	<td>{{ $user->email }}</td>
	    </tr>
	    <tr>
	    	<td >Codigo Postal:</td>
	    	 <td >{{ $user->codigopostal}}</td>
	    </tr>
		 <tr>     
		      
		      <td >Direccion:</td>  
		       <td>{{ $user->direccion}}</td>
	    </tr>
		 
	  </tbody>
	</table>
<table class="">
	  <thead>
	  
	    <tr>
	      <th width="50">Imagen</th>
	      <th width="200">Producto</th>
	      <th width="150">Precio</th>
	      <th width="156">Cantidad</th>
	      <th width="178">Subtotal</th>
	      
	    </tr>
	  </thead>
	  <tbody>

	  		@foreach($pedidoitems as $item)
		    <tr>
		      <td ><div class="img_cuadrada">
        				<img src="{{$item->producto->imagen}}">
    				</div>
			  </td>
		      <td>{{ $item->producto->nombre }}</td>
		      <td>{{ $item->producto->precio }}</td>
		      <td class="text-center">{{ $item->cantidad }}</td>
		      <td>{{ number_format($item->producto->precio * $item->cantidad,2)}}</td>
		      
		    </tr>
		    @endforeach
		 
	  </tbody>
	</table>
	<table>
		<tr>
			<th>Codigo de Seguimiento: {{$pedido->codSeguimiento}}</th> <th>ESTADO: {{$pedido->estado}}</th>
		</tr>
	</table>
	<table>
		<tr>
			<th>ENVIO: $50</th><th>TOTAL: ${{$pedido->subtotal+$pedido->envio}}</th>
		</tr>
	</table>
	@if($pedido->estado=='En preparacion' or $pedido->estado=='En camino')
	<table>
		<tr>
			<th width="762">
			<div class="text-center">
				<form action="{{ action('PedidosController@actualizar',[$pedido->id]) }}">
			    	<input class="button tiny success" type="submit" value="Actualizar">
			    </form>
	 		</div>
	 		</th>
		</tr>
	</table>
	@endif

@stop