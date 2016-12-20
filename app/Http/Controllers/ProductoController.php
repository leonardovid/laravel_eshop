<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Image;
use Redirect;
use App\Productos;
use Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.producto-agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $producto= new Productos();

       $image = Input::file('imagen');
       $filename = $image->getClientOriginalName();
       $imagenUri = '/img/productos/'.$producto->id. $filename;
        Image::make($image -> getRealPath())->resize('500','500')-> save('../public/img/productos/'.$producto->id. $filename);


       $rubroYcategoria= Input::get('categoria');
       $array= array();
       $array= explode(",", $rubroYcategoria);
       $rubro= $array[0];
       $categoria= $array[1];

       $descripcion= Input::get('descripcion');

       $precio= Input::get('precio');
       $precio = floatval($precio);

       $nombre =Input::get('nombre');

       $producto= new Productos();
       $producto->nombre=$nombre;
       $producto->imagen=$imagenUri;
       $producto->descripcion=$descripcion;
       $producto->precio=$precio;
       $producto->rubroid=$rubro;
       $producto->categoriaid=$categoria;
        
       $producto->save();
       

       

       return  view('panel.producto-agregar')->withCreado('true');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('panel.producto-eliminar')->with('id',$id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       return view('panel.producto-modificar')->with('id',$id);
    }
      
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
      $producto= Productos::findOrFail($id);
        $image = Input::file('imagen');
       if(isset($image))
       {
         $filename = $image->getClientOriginalName();
         $imagenUri = '/img/productos/'.$id. $filename;
        Image::make($image -> getRealPath())->resize('500','500')-> save('../public/img/productos/'.$id. $filename);

        
       unlink(public_path($producto->imagen));

       }

       $rubroYcategoria= Input::get('categoria');
       $array= array();
       $array= explode(",", $rubroYcategoria);
       $rubro= $array[0];
       $categoria= $array[1];

       $descripcion= Input::get('descripcion');

       $precio= Input::get('precio');
       $precio = floatval($precio);

       $nombre =Input::get('nombre');

       $producto= Productos::findOrFail($id);
       $producto->nombre=$nombre;
       if (isset($image)) {
         $producto->imagen=$imagenUri;
       }      
       $producto->descripcion=$descripcion;
       $producto->precio=$precio;
       $producto->rubroid=$rubro;
       $producto->categoriaid=$categoria;
        
       $producto->save();

       //Session::flash('message', 'Producto Modificado');
       return redirect('/panel/producto/list');

      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto= Productos::findOrFail($id);
        unlink(public_path($producto->imagen));
        $producto->eliminado='true';
        $producto->save();
        parse
        return redirect('/panel/producto/list');


    }

    
}
