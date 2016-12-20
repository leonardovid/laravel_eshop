

@extends('layout.main')
<?php
 use App\Categorias;

  $categoriasIndumentaria= Categorias::where(['rubroid'=>'1', 'eliminado'=>'false'])->get();
  $categoriasTextil=Categorias::where(['rubroid'=>'2', 'eliminado'=>'false'])->get();
 if(!is_null(Session::get('cart'))){
  $cart = Session::get('cart');
  }
 
 ?>
@section('contenido')

        
<!-- Side Bar -->
   
          <div class="large-4 small-12 columns contenedor-panel">
   
           
   
            <div class="hide-for-small panel categoria">
              <a href="{{ action('TiendaController@showByRubro', [1]) }}" class="animsition-link"><h3>Indumentaria:</h3></a>
              <ul>
                @foreach ($categoriasIndumentaria as $categoria)
         
                  <li><a href="{{ action('TiendaController@showByCategoria', [$categoria->id]) }}"class="animsition-link">
                      <h5 class="subheader"> {{$categoria->nombre}}
                      </h5>
                      </a>
                  </li>

                @endforeach
              </ul>
            </div>

            <div class="hide-for-small panel categoria">
              <a href="{{ action('TiendaController@showByRubro', [2]) }}" class="animsition-link"><h3>Textil:</h3></a>
                            <ul>
                @foreach ($categoriasTextil as $categoria)
         
                  <li><a href="{{ action('TiendaController@showByCategoria', [$categoria->id]) }}"class="animsition-link">
                      <h5 class="subheader"> {{$categoria->nombre}}
                      </h5>
                      </a>
                  </li>

                @endforeach
              </ul>
            </div>
   
            <a href="{{ action('CartController@show') }}" class="animsition-link">
            <div class="panel callout radius text-center total">

              @if(isset($cart))
                <h5 ><i class="fi-shopping-cart "></i>&nbsp&nbsp${{number_format($total,2)}}</h5>
              @else
                <h5 ><i class="fi-shopping-cart "></i>&nbsp&nbsp$0.00</h5>
              
              @endif
            </div>
            </a>
   
          </div>
   
          <!-- End Side Bar -->
   
   
          <!-- Thumbnails -->
      <div class="large-8 columns">

          <div class="row">
          <ul class="galeria ">
          @foreach($productos as $producto)


          <li class="galeria-item">
          <a href="{{'/producto/'.$producto->id}}" class=" item galeriaLink" id= "{{$producto->id}} ">
            <div class="large-4 small-6 columns ">           
              <div class="img_cuadrada">
                <img src="{{$producto->imagen}}">
              </div>
              <div class="panel">
                <h5>{{$producto->nombre}}</h5>
                <h6 class="subheader">${{$producto->precio}}</h6>
              </div>
            </div>
            </a>
          </li>
          @endforeach
          <div class="render text-center">{!! $productos->render() !!}</div>
         
           
          </ul>

          </div>
      </div>


@stop
@section('scripts')

@stop

