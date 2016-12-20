<?php
use App\Productos;
use App\Categorias;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',[
	'as' => 'index',
	'uses' => 'TiendaController@index'
	]);
Route::get('/producto/{id}', 'TiendaController@show');
Route::get('/AjaxProducto/{id}','TiendaController@AjaxProducto');
Route::get('/rubro/{rubroid}', 'TiendaController@showByRubro');
Route::get('/categoria/{categoriaid}', 'TiendaController@showByCategoria');



Route::get('/cart/', 'CartController@show');
Route::get('/cart/trash', 'CartController@trash');
Route::get('/cart/remove/{rowid}', 'CartController@remove');
Route::put('/cart/add/{id}', 'CartController@add');
Route::post('/cart/charge/{stripe}/{total}', 'CartController@charge');
Route::get('/cart/guardar', [
	
	'as' => 'cart.guardar',
	'uses' => 'CartController@guardarPedido'
	]);

Route::get('/detalle-pedido',[
	'middleware' => 'auth',
	'as' => 'detalle-pedido',
	'uses' => 'CartController@detallePedido'
	]);
Route::get('/cuenta',[
	'middleware' => 'auth',
	'as' => 'cuenta',
	'uses' => 'TiendaController@cuenta'
	]);
Route::get('/cuentaRecibidos',[
	'middleware' => 'auth',
	'as' => 'cuentaRecibidos',
	'uses' => 'TiendaController@cuentaRecibidos'
	]);



Route::group([ 'middleware'=>['auth'],'prefix'=>'panel'],function()
{
 	Route::get ('home', function(){
 		return view('panel.panel-main');
 	});


Route::get('/home', 'TiendaController@panel' );

Route::get('/producto/list', 'TiendaController@listaProductos' );
Route::resource('producto','ProductoController');

Route::get('/categorias/list', 'TiendaController@listaCategorias');
Route::resource('categoria','CategoriaController');

Route::get('/pedidos/nuevos', 'PedidosController@nuevos' );
Route::get('/pedidos/camino', 'PedidosController@enCamino' );
Route::get('/pedidos/completados', 'PedidosController@completados' );
Route::get('/pedidos/problemas', 'PedidosController@conProblemas' );
Route::get('/pedidos/actualizar/{id}', 'PedidosController@actualizar' );
Route::put('/pedidos/save/{id}', 'PedidosController@save' );
Route::get('/pedidos/show/{id}', 'PedidosController@show' );
Route::get('/pedidos/delete/{id}', 'PedidosController@destroy' );

Route::resource('producto','ProductoController');
Route::resource('categoria','CategoriaController');


});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



