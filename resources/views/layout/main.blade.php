<!DOCTYPE html>
  <html>
  <head>
    <title>Telas Ahora</title>
  
    <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/foundation-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('js/animsition/css/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  </head>
  <body>
  
  
<!-- Requires Foundation 4 | visit http://foundation.zurb.com to download -->

 
    <!-- Navigation -->
 
      
        
        <div class="azul">
       
          <nav class="top-bar row ">
            <ul class="title-area" >

              <!-- Title Area -->
              <li ><a href="/" class="animsition-link"> <h1 class="nombre" > Telas Ahora  </h1>  </a></li>
            </ul>
            <section class="top-bar-section">
              <!-- Right Nav Section -->
              <ul class="right">
                @if(Auth::check())
                    
                    @if(Auth::user()->tipo==='admin')
                    
                      <li class="">
                      <a href="{{action('TiendaController@panel')}}" id="ingresar" class="hover-blanco animsition-link">{{ Auth::user()->name }}</a>
                      </li>

                    @else
                    
                      <li class="">
                      <a href="{{action('TiendaController@cuenta')}}" id="ingresar" class="hover-blanco animsition-link">{{ Auth::user()->name }}</a>
                      </li>

                    @endif
                    <li id="logout"><a id="logout-a" href="{{ action('Auth\AuthController@getLogout') }}" ><i  class="fi-power"></i></a></li>
                @else
                  <li><a href="{{action('Auth\AuthController@getLogin')}}" id="ingresar" class="hover-blanco animsition-link">Ingresar</a></li>
                  <li id="logout"><a id="logout-a" href="{{action('Auth\AuthController@getLogin')}}" ><i  class="fi-torso"></i></a></li>
                @endif
              </ul>
            </section>

          </nav>         
        </div>

  @if(Session::has('crealizada'))
              <h3 id="crealizada" class=" text-center">Compra realizada con exito</h3>
              <?php Session::pull('crealizada','default') ?>

              @endif
    <!-- End Navigation -->

   <div class="row contenedor-galeria ">
      <div class="large-12 columns">
        <div class="row 2">
   
    
      
         
          @yield('contenido')

          
   
          
   
        </div>
      </div>
    </div>

  
 
        
   

    <!-- Footer -->
 
    <footer class="footer ">
      <div class="row ">
        <div class="small-12 medium-6 large-5 columns">
          <p class="logo"><i class="fi-home"></i> TELAS AHORA </p>
          <p class="footer-links">
            Horarios de atención:
           
          </p>
          <p class="footer-links">
            
              Lunes a viernes  de 8:00 a 12:00 y 16:00 a 20:00
            
          </p>

          <p class="footer-links">
            Sabados y domingos  de 8:00 a 12:00  
          </p>

        </div>

        <div class="small-12 medium-6 large-4 columns">
          <ul class="contact">
            <li><p><i class="fi-marker"></i><p>Córdoba 202, San francisco , Córdoba </p></li>
            <li><p><i class="fi-telephone"></i>3564 000010</p></li>
            <li><p><i class="fi-mail"></i>telasahora@outlook.com </p></li>
          </ul>
        </div>
        <div class="small-12 medium-12 large-3 columns">
          <p class="about"> </p>
          <p class="about subheader">Visita nuestas redes sociales.</p>
          <ul class="inline-list social">
            <a href="https://www.facebook.com/"><i class="fi-social-facebook"></i></a>
            
          </ul>
        </div>
      </div>
    </footer>
 
    <!-- End Footer -->
 
  
  
<script src="{{ asset('https://code.jquery.com/jquery-2.2.3.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/animsition/js/animsition.js') }}" type="text/javascript" charset="utf-8"></script>

@yield('scripts')
<script src="{{ asset('js/app.js') }}" type="text/javascript" charset="utf-8"></script>

</body>  

</html>