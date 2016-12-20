@extends('panel.panel-main')

@section('contenido-panel')

<div class="contenedor-lista">
	<div class="row ">
	  <div class="small-3 large-3 columns small-offset-1">Nombre</div>
	  
	  <div class="small-1 large-1 columns">Precio</div>
	  <div class="small-2 large-2 columns">Categoria</div>
	  <div class="small-2 large-2 columns"></div>
	  <div class="small-2 large-2 columns end"></div>
	</div>
	@foreach($productos as $producto)
	<div class="row">
	  <div class="small-3 large-3 columns small-offset-1">{{$producto->nombre}}</div>
	  
	  <div class="small-1 large-1 columns">{{$producto->precio}}</div>	  
	  <div class="small-2 large-2 columns">{{$producto->cat->nombre}}</div>
	  <div class="small-2 large-2 columns">
		<form action="{{ action('ProductoController@edit',[$producto->id]) }}">
	    	<input class="button tiny" type="submit" value="Modificar">
	    </form>
	 </div>
	 <div class="small-2 large-2 columns end">
		<form action="{{ action('ProductoController@show',[$producto->id]) }}">
	    	<input class="button tiny" type="submit" value="Eliminar">
	    </form>
	 </div>
	 </div> 
	@endforeach
	<div class="render text-center">{!! $productos->render() !!}</div>
	
</div>

@stop