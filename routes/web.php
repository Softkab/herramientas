<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Sunra\PhpSimple\HtmlDomParser;
use App\Subcategorias;  

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/categorias.json', 'CategoriaController@categoriasjson');
Auth::routes();

Route::get('/productos', 'HomeController@index');
Route::get('/subcategorias/json/{url}', 'SubcategoriaController@index');
Route::get('/subsubcategorias/json/{url}', 'SubsubcategoriaController@index');

Route::get('/herramientas/{url}','CategoriaController@index');
Route::get('/herramientasultimas/','CategoriaController@ultimas');
Route::get('/productos/{url}','HomeController@productos');

Route::get('/herramienta/{id}','ProductoController@index');
Route::get('/herramientanombre/{url}','ProductoController@nombre');
Route::get('/nuevo/producto', 'HerramientaController@nuevo');
Route::post('/nuevo/producto', 'HerramientaController@store');
Route::get('/producto/{id}','HomeController@herramienta');
//Route::get('/herramienta/{url}', 'ProductoController@index');
Route::get('/herramienta/editar/{id}', 'HerramientaController@editar');
Route::resource('herramienta', 'HerramientaController');
Route::post('/herramienta/editar/{id}', 'HerramientaController@posteditar');
Route::post('/herramienta/borrar/{id}', 'HerramientaController@destroy');
Route::get('/herramienta/borrar/{id}', 'HerramientaController@destroy');
Route::resource('queries', 'QueryController');
Route::resource('categorias', 'CategoriasController');
Route::resource('subcategorias', 'SubcategoriasController');
Route::resource('subsubcategorias', 'SubsubcategoriasController');
//Route::resource('productos', 'ProductosController');