<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pedidos;
use Input;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevos()
    {
         $pedidos=Pedidos::orderBy('id','desc')->where('estado','En preparacion')->simplePaginate(15);

         return view('panel.lista-pedidos')->with('pedidos',$pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enCamino()
    {
        $pedidos=Pedidos::orderBy('id','desc')->where('estado','En camino')->simplePaginate(15);

         return view('panel.lista-pedidos')->with('pedidos',$pedidos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function completados()
    {
        $pedidos=Pedidos::orderBy('id','desc')->where('estado','Recibido')->simplePaginate(15);

         return view('panel.lista-pedidos')->with('pedidos',$pedidos);
    }


    public function conProblemas()
    {
        $pedidos=Pedidos::orderBy('id','desc')->where('estado','No Recibido')->simplePaginate(15);

         return view('panel.lista-pedidos')->with('pedidos',$pedidos);
    }


    public function show($id)
    {
        $pedido=Pedidos::findOrFail($id);

        return view('panel.pedido-mostrar')->with('pedido',$pedido);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar($id)
    {
        $pedido=Pedidos::findOrFail($id);
        return view('panel.pedido-actualizar')->with('pedido',$pedido);
    }

    public function save($id)
    {

         $pedido=Pedidos::findOrFail($id);
         if ($pedido->estado=='En preparacion') {
             $codigo=Input::get('codigo');

             $pedido->codSeguimiento=$codigo;
             $pedido->estado='En camino';
             $pedido->save();
             return redirect('/panel/pedidos/nuevos');
         }
         else{
             $estado=Input::get('estado');
            
             $pedido->estado=$estado;
             $pedido->save();
             return redirect('/panel/pedidos/camino');
         }


         

    }


    public function destroy($id)
    {
        $pedidos= Pedidos::findOrFail($id);
        $pedidos->delete();

        return redirect('/panel/pedidos');
    }
}
