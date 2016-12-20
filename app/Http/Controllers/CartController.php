<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Session;
use App\Productos;
use Cart;
use Stripe;
use Redirect;
use App\Pedidos;
use App\PedidoItems;
use Auth;

class CartController extends Controller
{
    public function __construct(){
        if(!Session::has('cart')) Session::put('cart',array());
    }

    
    public function show()
    {
        $cart= Cart::content();
        $count = Cart::count();
        $total = Cart::total();
        return view('layout.cart')
                                ->with('cart',$cart)
                                ->with('count',$count)
                                ->with('total',$total);
    }

    public function trash()
    {
        Cart::destroy();
        return redirect("/cart");
    }
    
    public function remove($rowid)
    {
        Cart::remove($rowid);
        return redirect("/cart");
    }

    public function add($id)
    {
        $cantidad= Input::get('cantidad');
        $producto=Productos::find($id);
        Cart::add($producto->id, $producto->nombre, $cantidad , number_format($producto->precio, 2),array('image'=>$producto->imagen));

        return   redirect('/');
    }

    public function detallePedido()
    {
        if(Cart::count()<=0){
            return redirect('/');
        }
        $cart=Cart::content();
        $total=Cart::total();
        return view('layout.detalles-pedido')->with('cart',$cart)
                                             ->with('total',$total);
    }

    public function charge($stripe,$total)
    {
        $card = Stripe::cards()->create($stripe, $_POST['stripeToken']);
        $charge = Stripe::charges()->create([
                'customer' => $stripe,
                'currency' => 'ARS',
                'amount'   => $total
            ]);
       

      return Redirect::route('cart.guardar');
    }

    public function guardarPedido()
    {
        
        $pedido = new Pedidos;

        $pedido->subtotal=Cart::total();
        $pedido->envio=50;
        $pedido->user_id= Auth::user()->id;
        $pedido->save();

        $cart = Cart::content();

        foreach ($cart as $item ) {
            $pedidoItem= new PedidoItems;
            $pedidoItem->precio = $item->price;
            $pedidoItem->cantidad= $item->qty;
            $pedidoItem->producto_id=$item->id;
            $pedidoItem->pedido_id=$pedido->id;
            $pedidoItem->save();

        }
         Cart::destroy();
         Session::put('crealizada','true');
      return redirect('/');
    }


}
