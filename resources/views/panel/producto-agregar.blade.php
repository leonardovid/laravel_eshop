@extends('panel.panel-main')

@section('contenido-panel')

<form method="POST" action="{{action('ProductoController@store')}}" accept-charset="UTF-8" enctype="multipart/form-data" data-abide>
	<ul class="pricing-table producto">
	  
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <li class="title"><input type="text" name="nombre" placeholder='Nombre del Producto' required pattern="[a-zA-Z0-9\s]+" /></li>

	  <li class="bullet-item"> Imagen <input type="file" name='imagen' accept="image/*" / required > </li>

	  <li class="description"> <input type="text" name="descripcion" placeholder='Descripcion del Producto' required pattern="[a-zA-Z0-9\s]+" /></li>

	  <li class="price"><input type="number" name="precio" placeholder='Precio' required step="any" min="0" /></li>
	  
	  <li class="bullet-item">
	     <select name="categoria"  required>
	     	<option value="" disabled selected>Categoria</option>
	     	<option value="" disabled ></option>
	     	<option value="" disabled class="encabezado">Indumentaria</option>

		     <?php $categorias= DB::select('SELECT nombre,id FROM categorias WHERE rubroid=1') ?>

		    @foreach ($categorias as $categoria)
    		 <option value= "1,{{$categoria->id}}" class="opcion">  <p> &nbsp&nbsp {{$categoria->nombre }} </p></option>
			@endforeach	

			<option value="" disabled ></option>
			<option value="" disabled class="encabezado" >Textil</option>
			<?php $categorias= DB::select('SELECT nombre,id FROM categorias WHERE rubroid=2') ?>
		    @foreach ($categorias as $categoria)
    		 <option value= "2,{{$categoria->id}}" class="opcion" >   <p> &nbsp&nbsp  {{$categoria->nombre }} </p></option>
			@endforeach	

		  </select>
	  </li>
	  <li class="cta-button"><input class="button" type="submit" value="Agregar"></li>
	   @if(isset($creado))
		
		<li class="bullet-item " ><p class="creado">Producto Agregado</p></li>
		<?php $creado=NULL;?>
		@else

		<li class="bullet-item" >&nbsp</li>

		@endif
	</ul>
	
		
</form>





@stop
