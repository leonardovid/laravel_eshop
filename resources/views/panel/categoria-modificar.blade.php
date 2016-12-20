<?php
use App\Categorias;
$categoria=Categorias::find($id);
?>
@extends('panel.panel-main')

@section('contenido-panel')


<form method="POST" action="{{ action('CategoriaController@update',[$id]) }}" accept-charset="UTF-8" enctype="multipart/form-data" data-abide>
	<ul class="pricing-table producto">
	  
	  <input type="hidden" name="_method" value="PUT" />
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">

	  <li class="description"> <input type="text" name="nombre" placeholder='Nombre de la categoria' value="{{$categoria->nombre}}" required pattern="[ñ-a-zA-Z0-9\s]+" /></li>

	  <li class="bullet-item">
	     <select name="rubro"  required>
	     	<option value="" disabled selected>Rubro</option>
	     	<option value="" disabled ></option>
	     	
	     	<option value="" disabled class="encabezado">Rubro</option>
		     <?php $rubros= DB::select('SELECT nombre,id FROM rubros ') ?>

		    @foreach ($rubros as $rubro)
			    @if($categoria->rubroid===$rubro->id)
	    		 <option value= "{{$rubro->id}} opcion" selected >  <p>&nbsp&nbsp{{$rubro->nombre }} </p></option>
	    		 @else
	    		 <option value= "{{$rubro->id}} opcion"  >  <p>&nbsp&nbsp{{$rubro->nombre }} </p></option>
	    		 @endif
			@endforeach	

			

		  </select>
	  </li>
	  <li class="cta-button"><input class="button" type="submit" value="Modificar"></li>
	   @if(isset($creado))
		
		<li class="bullet-item " ><p class="creado">Categoria Agregada</p></li>
		<?php $creado=NULL;?>
		@else

		<li class="bullet-item" >&nbsp</li>

		@endif
	</ul>
	
		
</form>





@stop
