@extends('panel.panel-main')

@section('contenido-panel')

<div class="contenedor-lista">
	<div class="row ">
	  <div class="small-3 large-3 columns large-offset-1">Nombre</div>
	  
	  <div class="small-2 large-2 columns"></div>
	  <div class="small-2 large-2 columns end"></div>
	  
	  
	</div>
	@foreach($categorias as $categoria)
	<div class="row">
	  <div class="small-3 large-3 columns large-offset-1">{{$categoria->nombre}}</div>	    
	  
	  <div class="small-2 large-2 columns">
			<form action="{{ action('CategoriaController@edit',[$categoria->id]) }}">
		    	<input class="button tiny" type="submit" value="Modificar">
		    </form>
	  </div>
	  <div class="small-2 large-2 columns end">
			<form action="{{ action('CategoriaController@show',[$categoria->id]) }}">
		    	<input class="button tiny" type="submit" value="Eliminar">
		    </form>
	 </div>
	 
	  
	 </div> 
	@endforeach
	<div class="render text-center">{!! $categorias->render() !!}</div>
</div>

@stop
