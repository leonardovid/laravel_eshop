@extends('layout.main')

@section('contenido')

<div class=" categoria animsition">
	<div class="text-center" >
		<h1 class="carrito-titulo">Carrito de Compras</h1>
		<a href="{{ action('CartController@trash') }}" class="button  alert round text-center"><i class="fi-trash" ></i>Vaciar carrito</a>
	</div>
	<table class="large-offset-2">
	  <thead>
	    <tr>
	      <th width="50">Imagen</th>
	      <th width="200">Producto</th>
	      <th width="150">Precio</th>
	      <th width="50">Cantidad</th>
	      <th width="150">Subtotal</th>
	      <th width="50">Quitar</th>
	    </tr>
	  </thead>
	  <tbody>
	  		@foreach($cart as $item)
		    <tr>
		      <td ><div class="img_cuadrada">
        				<img src="{{$item->options->image}}">
    				</div>
			  </td>
		      <td>{{ $item->name }}</td>
		      <td>{{ $item->price }}</td>
		      <td class="text-center">{{ $item->qty }}</td>
		      <td>{{ number_format($item->price * $item->qty,2)}}</td>
		      <td class="text-center"><a href="{{ action('CartController@remove',[$item->rowid]) }}"><i class='fi-x'></i></a></td>
		    </tr>
		    @endforeach
		 
	  </tbody>
	</table>
	
	@if($count===0)	
		  <table class="large-offset-2">
		  	<tbody>
		  	<tr ><td width="724">El carrito se encuentra vacio</td></tr>
		  	</tbody>
		  </table>
	@endif
	@if(!isset($total))
	<?php $total=0; ?>
	@endif
	<div class="text-center">
		<h4 class="total">Total: ${{number_format($total,2)}}</h4>
	</div>
	<div class="text-center" >
		<div class="boton-carrito" >
			<a href="{{ action('TiendaController@index') }}" class="button width-130   round text-center">Atras</a>
		</div>
		<div class="boton-carrito" >
		
			<a href="{{ action('CartController@detallePedido') }}" class="button width-130 success round text-center">Continuar</a>
		</div>
	
	</div>

</div>
@stop