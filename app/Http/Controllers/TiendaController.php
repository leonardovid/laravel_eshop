<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Productos;
use App\Categorias;
use Cart;
use Input;
use Stripe;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $productos=Productos::orderBy('id','desc')->where('eliminado','false')->simplePaginate(12);
        $total= Cart::total();
        return view('index')->with('productos', $productos)
                            ->with('total',$total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showByRubro($rubroid)
    {
        $productos=Productos::where(['rubroid'=>$rubroid , 'eliminado'=>'false'])->simplePaginate(15);
        $total= Cart::total();
        return view('index')->with('productos', $productos)->with('total',$total);
    }

    public function showByCategoria($categoriaid)
    {
        $productos=Productos::where(['categoriaid'=>$categoriaid, 'eliminado'=>'false'])->simplePaginate(15);
        $total= Cart::total();
        return view('index')->with('productos', $productos)->with('total',$total);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('layout.producto')->withId($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function panel()
    {
        return view('panel.panel-main');
    }

    public function cuenta()
    {   
        $seleccionado="espera";
        return view('layout.cuenta')->with('seleccionado',$seleccionado);
    }

    public function cuentaRecibidos()
    {
        $seleccionado="recibidos";
        return view('layout.cuenta')->with('seleccionado',$seleccionado);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * Update the specified resource in storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listaProductos()
    {
        $productos=Productos::orderBy('id','desc')->where('eliminado','false')->simplePaginate(15);

        return view('panel.lista-productos')->with('productos', $productos);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listaCategorias()
    {
        $categorias=Categorias::orderBy('id','desc')->where('eliminado','false')->simplePaginate(15);
       
        return view('panel.lista-categorias')->with('categorias', $categorias);
    }

    public function AjaxProducto($id)
    {
        return view('layout.AJAXProducto')->with('id',$id);
    }


    

    





}