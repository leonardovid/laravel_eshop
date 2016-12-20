<?php use App\Productos;?>

@extends('layout.main')

@section('contenido')
<?php $producto=Productos::find($id); ?>



<form method="POST" action="{{ action('CartController@add',[$producto->id]) }}" accept-charset="UTF-8" enctype="multipart/form-data" data-abide >
  <ul class="pricing-table producto">
      
    <input type="hidden" name="_method" value="PUT" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <li class="title">{{$producto->nombre}}</li>
    <li >
      
        <div class="img_cuadrada">
            <img src="{{$producto->imagen}}">
       
    </div>    
    </li>
    <li class="description">  {{$producto->descripcion}} </li>
    <li class="price">${{$producto->precio}}</li>
    @if($producto->rubroid===1)
    <?php $cantidad="Unidad/es"; ?>
    @else
    <?php $cantidad="Metro/s"; ?>
    @endif
    <li class="bullet-item">
      <div class="row">
        <div class="small-2 large-2 columns large-offset-5 ">
          <input type="number" min="1" value="1" name="cantidad" required> 
   
        </div>
        <div class="small-2 large-2 columns end">
         <p class="unidad"> {{ $cantidad }} </p>
        </div>
      </div>
      
    </li>
    @if($producto->eliminado === 'false')
    <li class="cta-button"><input class="button" type="submit" value="Agregar al carro"></li>
    @endif
  </ul>
</form>

@stop