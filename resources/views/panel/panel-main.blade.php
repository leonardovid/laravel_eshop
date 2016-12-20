@extends('layout.main')

@section('contenido')

          <div class="large-4 small-12 columns">
   
               
                 <div class="hide-for-small panel categoria">
                  <h3>Pedidos:</h3>
                  <ul>
                    <li><a href= "{{ action('PedidosController@nuevos') }}" >
                        <h5 class="subheader">Nuevos
                        </h5>
                        </a>
                    </li>
                    <li><a href= "{{ action('PedidosController@enCamino') }}" >
                        <h5 class="subheader">En camino
                        </h5>
                        </a>
                    </li>
                                        <li><a href= "{{ action('PedidosController@completados') }}" >
                        <h5 class="subheader">Completados
                        </h5>
                        </a>
                    </li>
                    
                   <li><a href= "{{ action('PedidosController@conProblemas') }}" >
                        <h5 class="subheader">Con Problemas
                        </h5>
                        </a>
                    </li>
                    

                    
                  </ul>
                </div>


                <div class="hide-for-small panel categoria">
                  <h3>Producto:</h3>
                  <ul>
                    <li><a href= "{{ action('ProductoController@create') }}" >
                        <h5 class="subheader">Agregar 
                        </h5>
                        </a>
                    </li>

                    <li><a href="/panel/producto/list">
                        <h5 class="subheader">Modificar/Eliminar
                        </h5>
                        </a>
                    </li>

                    
                    
                  </ul>
                </div>

                <div class="hide-for-small panel categoria">
                  <h3>Categoria:</h3>
                                <ul>
                  <li><a href="{{ action('CategoriaController@create') }}">
                        <h5 class="subheader">Agregar 
                        </h5>
                        </a>
                    </li>

                    <li><a href="/panel/categorias/list">
                        <h5 class="subheader">Modificar/Eliminar 
                        </h5>
                        </a>
                    </li>

                    
                  </ul>
                </div>
</div>
            <!-- Thumbnails -->
      <div class="large-8 columns">

          <div class="row">

          @yield('contenido-panel')

          </div>
      </div>

@stop
