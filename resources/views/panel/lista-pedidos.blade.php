@extends('panel.panel-main')

@section('contenido-panel')

<div class="contenedor-lista">
	<div class="row ">
	  <div class="small-3 large-3 columns small-offset-1">Fecha</div>
	  
	  <div class="small-2 large-2 columns">Usuario</div>
	  <div class="small-1 large-1 columns">Total</div>
	  <div class="small-2 large-2 columns"></div>
	  <div class="small-2 large-2 columns end"></div>
	</div>
	@foreach($pedidos as $pedido)
	<div class="row">
	  <?php $date=strtotime($pedido->updated_at) ?>
	  <div class="small-3 large-3 columns small-offset-1">{{date("d-m-Y",$date)}}</div>
	  
	  <div class="small-2 large-2 columns">{{$pedido->usuarios->email}}</div>	  
	  <div class="small-1 large-1 columns">{{$pedido->subtotal+$pedido->envio}}</div>
	  <div class="small-2 large-2 columns">
		<form action="{{ action('PedidosController@show',[$pedido->id]) }}">
	    	<input class="button tiny" type="submit" value="Detalle">
	    </form>
	 </div>
	 <div class="small-2 large-2 columns end">
	 @if($pedido->estado == 'En preparacion')
		<form action="{{ action('PedidosController@actualizar',[$pedido->id]) }}">
	    	<input class="button tiny success" type="submit" value="Actualizar">
	    </form>
	 @else{{{ $pedido->estado }}}  
	 @endif
	 </div>
	 </div> 
	@endforeach
	<div class="render text-center">{!! $pedidos->render() !!}</div>
	
</div>

@stop