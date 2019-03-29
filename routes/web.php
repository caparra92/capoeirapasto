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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', ['middleware' => 'auth', function()
{
    return view('admin.dashboard');
}]);


 
//users

Route::get('/admin/users', 'UserController@index')->middleware('auth');
Route::get('/admin/users/new', 'UserController@create')->middleware('auth');
Route::get('/admin/users/edit/{id}', 'UserController@edit')->middleware('auth');
Route::get('/admin/users/delete/{id}', 'UserController@destroy')->middleware('auth');
Route::get('/admin/users/profile/{id}', 'UserController@show')->middleware('auth');

Route::post('/admin/users/store', 'UserController@store')->middleware('auth');
Route::post('/admin/users/update/{id}', 'UserController@update')->middleware('auth');
Route::post('/admin/users/updateImg','UserController@updateImg')->middleware('auth');

//categorias
Route::get('/admin/categories', 'CategoriaController@index')->middleware('auth');
Route::get('/admin/categories/new', 'CategoriaController@create')->middleware('auth');
Route::get('/admin/categories/edit/{id}', 'CategoriaController@edit')->middleware('auth');
Route::get('/admin/categories/delete/{id}', 'CategoriaController@destroy')->middleware('auth');

//categoria blog
Route::get('/category/{nombre}', 'CategoriaController@category');

Route::post('/admin/categories/store', 'CategoriaController@store')->middleware('auth');
Route::post('/admin/categories/update/{id}', 'CategoriaController@update')->middleware('auth');

//posts
Route::get('/admin/posts', 'PostController@index')->middleware('auth');
Route::get('/admin/posts/new/', 'PostController@create')->middleware('auth');
Route::get('/admin/posts/edit/{id}', 'PostController@edit')->middleware('auth');
Route::get('/admin/posts/delete/{id}', 'PostController@destroy')->middleware('auth');

//post con slug
Route::get('/post/{slug}','PostController@post');

Route::post('/admin/posts/store/', 'PostController@store')->middleware('auth');
Route::post('/admin/posts/update/{id}', 'PostController@update')->middleware('auth');

//pagos
Route::get('/admin/pagos', 'PagoController@index')->middleware('auth');
Route::get('/admin/pagos/new', 'PagoController@create')->middleware('auth');
Route::get('/admin/pagos/edit/{id}', 'PagoController@edit')->middleware('auth');
Route::get('/admin/pagos/delete/{id}', 'PagoController@destroy')->middleware('auth');
Route::get('/admin/pagos/profile/{id}', 'PagoController@show')->middleware('auth');

Route::post('/admin/pagos/store', 'PagoController@store')->middleware('auth');
Route::post('/admin/pagos/update/{id}', 'PagoController@update')->middleware('auth');

//comentarios
Route::get('/admin/post/{id}/coments', 'ComentarioController@index')->middleware('auth');
Route::post('/post/coment', 'ComentarioController@store')->middleware('auth');
Route::get('/admin/post/coment/delete/{id}','ComentarioController@destroy')->middleware('auth');

//usuarios-pagos
Route::get('/admin/pagos/user/{id}', 'PagoController@user')->middleware('auth');
Route::get('/admin/pagos/user/', 'PagoController@pagosIndex')->middleware('auth');
Route::get('/admin/pagos/user/edit/{id}', 'PagoController@editUser')->middleware('auth');
Route::get('/admin/pagos/user/delete/{id}', 'PagoController@deleteUser')->middleware('auth');
Route::get('/admin/pagos/user/estado/{id}', 'PagoController@updateEstado')->middleware('auth');

Route::post('/admin/pagos/user/add/{id}', 'PagoController@addUser')->middleware('auth');
Route::post('/admin/pagos/user/update/{id}', 'PagoController@updateUser')->middleware('auth');

Route::post('/admin/pagos/user/filter', 'PagoController@filter')->middleware('auth');
