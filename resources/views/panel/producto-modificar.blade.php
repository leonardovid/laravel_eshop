<?php use App\Productos;?>
@extends('panel.panel-main')

@section('contenido-panel')

<?php 
 $producto=Productos::find($id);
 ?>

<form method="POST" action="{{ action('ProductoController@update',[$id]) }}" accept-charset="UTF-8" enctype="multipart/form-data" data-abide>
	<ul class="pricing-table producto">
	  	
	  <input type="hidden" name="_method" value="PUT" />
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <li class="title"><input type="text" name="nombre" placeholder='Nombre del Producto' required pattern="[a-zA-Z0-9\s]+" value="{{$producto->nombre}}" /></li>

	  <li class="bullet-item"> <p>Si desea cambiar la imagen  seleccione una nueva <br><p> <input type="file" name='imagen' accept="image/*" /  ></li>

	  <li><div class="img_cuadrada">
          <img src="{{$producto->imagen}}"></div></li>

	  <li class="description"> <input type="text" name="descripcion" placeholder='Descripcion del Producto' required pattern="[a-zA-Z0-9\s]+" value="{{$producto->descripcion}}" /> </li>

	  <li class="price"><input type="number" name="precio" placeholder='Precio' required step="any" min="0" value="{{$producto->precio}}"/></li>
	  
	  <li class="bullet-item">
	     <select name="categoria"  required>
	     	<option value="" disabled selected>Categoria</option>
	     	<option value="" disabled ></option>
	     	<option value="" disabled class="encabezado">Indumentaria</option>

		     <?php $categorias= DB::select('SELECT nombre,id FROM categorias WHERE rubroid=1');
		      ?>

		    @foreach ($categorias as $categoria)
			    @if ("1,{$categoria->id}" === "{$producto->rubroid},{$producto->categoriaid}")
	    		 <option value= "1,{{$categoria->id}}" class="opcion" selected>  <p> &nbsp&nbsp {{$categoria->nombre }} </p></option>
	    		@else
	    		 <option value= "1,{{$categoria->id}}" class="opcion">  <p> &nbsp&nbsp {{$categoria->nombre }} </p></option>
	    		 @endif
			@endforeach	

			<option value="" disabled ></option>
			<option value="" disabled class="encabezado" >Textil</option>
			<?php $categorias= DB::select('SELECT nombre,id FROM categorias WHERE rubroid=2') ?>
		    @foreach ($categorias as $categoria)
    		  @if ("2,{$categoria->id}"=== "{$producto->rubroid},{$producto->categoriaid}")
	    		 <option value= "2,{{$categoria->id}}" class="opcion" selected>  <p> {{$categoria->nombre }}  </p></option>
	    		@else
	    		 <option value= "2,{{$categoria->id}}" class="opcion" >  <p> &nbsp&nbsp {{$categoria->nombre }} </p></option>
	    		 @endif
			@endforeach	

		  </select>
	  </li>
	  <li class="cta-button"><input class="button" type="submit" value="Modificar"></li>
	   @if(isset($creado))
		
		<li class="bullet-item " ><p class="creado">Producto Agregado</p></li>
		<?php $creado=NULL;?>
		@else

		<li class="bullet-item" >&nbsp</li>

		@endif
	</ul>
	
		
</form>





@stop
