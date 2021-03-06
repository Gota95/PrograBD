<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/map',function(){
    return view('catalogo.mapa');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//RUTA PARA MODULO DE REGISTRO DE SURCURSAL
Route::resource('sucursal','SucursalController');

//RUTA PARA MODULO DE PRODUCTO
Route::resource('categoria','CategoriaController');

Route::resource('articulo','ArticuloController');
Route::resource('ventas','VentaController');
Route::resource('ingreso','IngresoController');

//RUTA PARA MODULO DE USUARIOS
Route::resource('tipo','TipoController');
Route::resource('users','UsersController');
Route::resource('persona','PersonaController');

//RUTA PARA MODULO DE REPORTES
Route::name('imprimir')->get('/venta','RVentasController@ver');
Route::post('Venta', 'RVentasController@imprimir');
Route::name('general')->get('/general','RVentasController@general');
Route::name('argeneral')->get('/articulos','RarticuloController@general');
Route::name('productos')->get('/productos','RProductosController@imprimir');
Route::name('clientes')->get('/clientes','RClienteController@cliente');
Route::name('top20')->get('/top20','RTopController@imprimirtop');

Route::get('catalogo/{id}/carrito', 'CatalogoController@carrito')->name('catalogo.carrito');
Route::get('/eliminarc', 'CatalogoController@eliminar');
//RUTA PARA MODULO DE CATALOGO
Route::resource('catalogo','CatalogoController');
