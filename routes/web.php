<?php
use App\User;
use App\Categoria;

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
//Vista index
Route::get('/', 'PostController@show');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', ['middleware' => 'auth','uses'=>'HomeController@index']);


 
//users

Route::get('/admin/users', ['middleware'=>['auth','role:admin'],'uses'=>'UserController@index']);
Route::get('/admin/users/new', ['middleware'=>['auth','role:admin'],'uses'=>'UserController@create']);
Route::get('/admin/users/edit/{id}', ['middleware'=>'auth','uses'=>'UserController@edit']);
Route::get('/admin/users/delete/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'UserController@destroy']);
Route::get('/admin/users/profile/{id}', 'UserController@show')->middleware('auth');

Route::post('/admin/users/store', 'UserController@store')->middleware('auth');
Route::post('/admin/users/update/{id}', 'UserController@update')->middleware('auth');
Route::post('/admin/users/updateImg','UserController@updateImg')->middleware('auth');

//categorias
Route::get('/admin/categories', ['middleware'=>['auth','role:admin'],'uses'=>'CategoriaController@index']);
Route::get('/admin/categories/new', ['middleware'=>['auth','role:admin'],'uses'=>'CategoriaController@create']);
Route::get('/admin/categories/edit/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'CategoriaController@edit']);
Route::get('/admin/categories/delete/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'CategoriaController@destroy']);

//categoria blog
Route::get('/category/{nombre}', 'CategoriaController@category');

Route::post('/admin/categories/store', 'CategoriaController@store')->middleware('auth');
Route::post('/admin/categories/update/{id}', 'CategoriaController@update')->middleware('auth');

//posts
Route::get('/admin/posts', ['middleware'=>['auth','role:admin'],'uses'=>'PostController@index']);
Route::get('/admin/posts/new/', ['middleware'=>['auth','role:admin'],'uses'=>'PostController@create']);
Route::get('/admin/posts/edit/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'PostController@edit']);
Route::get('/admin/posts/delete/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'PostController@destroy']);

//post con slug
Route::get('/post/{slug}','PostController@post');

Route::post('/admin/posts/store/', 'PostController@store')->middleware('auth');
Route::post('/admin/posts/update/{id}', 'PostController@update')->middleware('auth');

//pagos
Route::get('/admin/pagos', ['middleware'=>['auth','role:admin'],'uses'=>'PagoController@index']);
Route::get('/admin/pagos/new', ['middleware'=>['auth','role:admin'],'uses'=>'PagoController@create']);
Route::get('/admin/pagos/edit/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'PagoController@edit']);
Route::get('/admin/pagos/delete/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'PagoController@destroy']);
Route::get('/admin/pagos/profile/{id}', ['middleware'=>'auth','uses'=>'PagoController@show']);
Route::get('/admin/pagos/caja/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'PagoController@selectcaja']);

Route::post('/admin/pagos/store', 'PagoController@store')->middleware('auth');
Route::post('/admin/pagos/update/{id}', 'PagoController@update')->middleware('auth');

//comentarios
Route::get('/admin/post/{id}/coments', 'ComentarioController@index')->middleware('auth');
Route::post('/post/coment', 'ComentarioController@store')->middleware('auth');
Route::get('/admin/post/coment/delete/{id}','ComentarioController@destroy')->middleware('auth');

//usuarios-pagos
Route::get('/admin/pagos/user/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'Pagocontroller@user']);
Route::get('/admin/pagos/user/', ['middleware'=>['auth','role:admin'],'uses'=>'Pagocontroller@pagosIndex']);
Route::get('/admin/pagos/user/edit/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'Pagocontroller@editUser']);
Route::get('/admin/pagos/user/delete/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'Pagocontroller@deleteUser']);
Route::post('/admin/pagos/user/estado/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'Pagocontroller@updateEstado']);

Route::post('/admin/pagos/user/add/{id}', 'PagoController@addUser')->middleware('auth');
Route::post('/admin/pagos/user/update/{id}', 'PagoController@updateUser')->middleware('auth');

Route::post('/admin/pagos/user/filter', 'PagoController@filter')->middleware('auth');

//cajas
Route::get('/admin/cajas', ['middleware'=>['auth','role:admin'],'uses'=>'CajaController@index']);
Route::get('/admin/cajas/new', ['middleware'=>['auth','role:admin'],'uses'=>'CajaController@create']);
Route::get('/admin/cajas/edit/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'CajaController@edit']);
Route::get('/admin/cajas/delete/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'CajaController@destroy']);
Route::get('/admin/cajas/open/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'CajaController@apertura']);
Route::get('/admin/cajas/close/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'CajaController@cierre']);
Route::get('/admin/cajas/mov/{id}', ['middleware'=>['auth','role:admin'],'uses'=>'CajaController@movindex']);

Route::post('/admin/cajas/store', 'CajaController@store')->middleware('auth');
Route::post('/admin/cajas/update/{id}', 'CajaController@update')->middleware('auth');
Route::post('/admin/cajas/estado/{id}', 'CajaController@updateEstado')->middleware('auth');

