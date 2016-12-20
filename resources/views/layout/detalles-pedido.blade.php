
@extends('layout.main')

@section('contenido')

<div class=" categoria animsition">
	<div class="text-center" >
		<h1 class="carrito-titulo">Datos del Usuario</h1>
		
	<table class="large-offset-2">
	  
	  <tbody>
	  	<tr>
		      <td width="380">Usuario:</td>
		       <td width="380">{{ Auth::user()->name." ". Auth::user()->apellido }}</td>
	    </tr>
	    <tr>
	    	<td >Correo:</td>
	    	<td>{{ Auth::user()->email }}</td>
	    </tr>
	    <tr>
	    	<td >Codigo Postal:</td>
	    	 <td >{{ Auth::user()->codigopostal}}</td>
	    </tr>
		 <tr>     
		      
		      <td >Direccion:</td>  
		       <td>{{ Auth::user()->direccion}}</td>
	    </tr>
		 
	  </tbody>
	</table>




	<div class="text-center" >
		<h1 class="carrito-titulo">Detalles del pedido</h1>
		
	</div>
	<table class="large-offset-2">
	  <thead>
	    <tr>
	      
	      <th width="200">Producto</th>
	      <th width="156">Precio</th>
	      <th width="200">Cantidad</th>
	      <th width="200">Subtotal</th>
	      
	    </tr>
	  </thead>
	  <tbody>
	  		@foreach($cart as $item)
		    <tr>
		      
		      <td>{{ $item->name }}</td>
		      <td>{{ $item->price }}</td>
		      <td class="text-center">{{ $item->qty }}</td>
		      <td>{{ number_format($item->price * $item->qty,2)}}</td>
		      
		    </tr>
		    @endforeach
		 
	  </tbody>
	</table>
	
	
	<div class="text-center">
		<?php $total+=50 ?>
		<h4 class="total">Total mas envio: ${{number_format($total,2)}}</h4>
		
	</div>
	<div class="text-center" >
		<div class="boton-carrito" >
			<a href="{{ action('TiendaController@index') }}" class="button width-130   round text-center">Cancelar</a>
		</div>
		<div class="boton-carrito" >
			<?php $stripe = Auth::user()->stripe;
			$amount= $total *100;
			$email =Auth::user()->email; ?>



				<form action="{{ action('CartController@charge',[$stripe, $total]) }}" method="post">
				        <noscript>Debes <a href="http://www.enable-javascript.com" target="_blank">activar JavaScript</a> en tu navegador web para poder realizar el pago via Stripe.</noscript>
				        <input type="hidden" name="_token" value="{{ csrf_token() }}">
				        <input 
				            type="submit" 
				            value="Comprar"
				              data-key="pk_test_d3si4rbGewZyQJkoW0Ys2AFg"
					          data-name="Tienda Mayo"
					          data-email=<?php echo $email ?>
					          data-amount=<?php echo $amount ?>
					          data-label="Comprar"
					          data-allow-remember-me="false"
					          data-locale="es"
					          class="button width-130 success round text-center "

				             />

				        <script src="https://checkout.stripe.com/v2/checkout.js"></script>
				        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
				        <script>
				        $(document).ready(function() {
				            $(':submit').on('click', function(event) {
				                event.preventDefault();
				                var $button = $(this),
				                    $form = $button.parents('form');
				                var opts = $.extend({}, $button.data(), {
				                    token: function(result) {
				                        $form.append($('<input>').attr({ type: 'hidden', name: 'stripeToken', value: result.id })).submit();
				                    }
				                });
				                StripeCheckout.open(opts);
				            });
				        });
				        </script>
				</form>



			
		</div>
	
	</div>

</div>
</div>

@stop