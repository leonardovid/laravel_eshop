<?php use App\Productos;?>

@extends('layout.main')

@section('contenido')
<?php $producto=Productos::find($id); ?>

<ul class="pricing-table producto">
  <li class="title">{{$producto->nombre}}</li>
  <li >
    
      <div class="img_cuadrada">
          <img src="{{$producto->imagen}}">
     
  </div>    
  </li>
  <li class="description">  {{$producto->descripcion}} </li>
  <li class="price">{{$producto->precio}}</li>
  
  
</ul>
<form method="POST" action="{{ action('ProductoController@destroy',[$id]) }}" accept-charset="UTF-8" enctype="multipart/form-data" data-abide>
	<ul class="pricing-table producto eliminar">
	  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <input type="hidden" name="_method" value="DELETE" />

	  <li class="bullet-item"><input type="checkbox" name="eliminar" value="true" required> Deseo eliminar este producto<br></li>
	  <li class="cta-button"><input class="button" type="submit" value="Eliminar"></li>

</form>


@stop
