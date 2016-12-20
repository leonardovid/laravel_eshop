<?php use App\Categorias;?>

@extends('panel.panel-main')

@section('contenido-panel')
<?php $categoria=Categorias::find($id); ?>

<ul class="pricing-table producto">
  <li class="title">Categoria: {{$categoria->nombre}}</li>
  <?php $rubros= DB::select('SELECT nombre,id FROM rubros ') ?>

		    @foreach ($rubros as $rubro)
			    @if($categoria->rubroid===$rubro->id)
	    		 <li class="bullet-item"> Rubro: {{$rubro->nombre }}</li>
	       		 @endif
			@endforeach	
  
  
</ul>
<form method="POST" action="{{ action('CategoriaController@destroy',[$id]) }}" accept-charset="UTF-8" enctype="multipart/form-data" data-abide>
	<ul class="pricing-table producto eliminar">
	  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <input type="hidden" name="_method" value="DELETE" />

	  <li class="bullet-item"><input type="checkbox" name="eliminar" value="true" required> Deseo eliminar esta categoria <br></li>
	  <li class="cta-button"><input class="button" type="submit" value="Eliminar"></li>

</form>


@stop
