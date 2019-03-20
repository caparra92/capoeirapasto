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

Route::get('/', 'PostController@show');

Route::get('/new', function(){
    
});

Route::get('/categorias', function(){
    $categorias = User::find(1)->categorias;

    foreach($categorias as $categoria){
        echo($categoria->nombre)."<br>";
    }
});

Route::get('/usuario', function(){
    $categoria = Categoria::find(1);
    echo $categoria->user->nombre;
    
});

Route::get('/usuario/{id}/pago', function($id){
    $usuario = User::find($id);

    foreach($usuario->pagos as $pago){
        echo($pago->detalle)."<br>";
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', ['middleware' => 'auth', function()
{
    return view('admin.dashboard');
}]);


 
//users

Route::get('/admin/users', 'UserController@index');
Route::get('/admin/users/new', 'UserController@create');
Route::get('/admin/users/edit/{id}', 'UserController@edit');
Route::get('/admin/users/delete/{id}', 'UserController@destroy');
Route::get('/admin/users/profile/{id}', 'UserController@show');

Route::post('/admin/users/store/', 'UserController@store');
Route::post('/admin/users/update/{id}', 'UserController@update');

//categorias
Route::get('/admin/categories', 'CategoriaController@index');
Route::get('/admin/categories/new', 'CategoriaController@create');
Route::get('/admin/categories/edit/{id}', 'CategoriaController@edit');
Route::get('/admin/categories/delete/{id}', 'CategoriaController@destroy');

Route::post('/admin/categories/store', 'CategoriaController@store');
Route::post('/admin/categories/update/{id}', 'CategoriaController@update');

//posts
Route::get('/admin/posts', 'PostController@index');
Route::get('/admin/posts/new/', 'PostController@create');
Route::get('/admin/posts/edit/{id}', 'PostController@edit');
Route::get('/admin/posts/delete/{id}', 'PostController@destroy');

//post con slug
Route::get('/post/{slug}','PostController@post');

Route::post('/admin/posts/store/', 'PostController@store');
Route::post('/admin/posts/update/{id}', 'PostController@update');

//pagos
Route::get('/admin/pagos', 'PagoController@index');
Route::get('/admin/pagos/new', 'PagoController@create');
Route::get('/admin/pagos/edit/{id}', 'PagoController@edit');
Route::get('/admin/pagos/delete/{id}', 'PagoController@destroy');
Route::get('/admin/pagos/profile/{id}', 'PagoController@show');

Route::post('/admin/pagos/store', 'PagoController@store');
Route::post('/admin/pagos/update/{id}', 'PagoController@update');

//comentarios
Route::get('/admin/post/{id}/coments', 'ComentarioController@index');
Route::post('/post/coment', 'ComentarioController@store');
Route::get('/admin/post/coment/delete/{id}','ComentarioController@destroy');

//usuarios-pagos
Route::get('/admin/pagos/user/{id}', 'PagoController@user');
Route::get('/admin/pagos/user/', 'PagoController@pagosIndex');
Route::get('/admin/pagos/user/edit/{id}', 'PagoController@editUser');
Route::get('/admin/pagos/user/delete/{id}', 'PagoController@deleteUser');
Route::get('/admin/pagos/user/estado/{id}', 'PagoController@updateEstado');

Route::post('/admin/pagos/user/add/{id}', 'PagoController@addUser');
Route::post('/admin/pagos/user/update/{id}', 'PagoController@updateUser');

Route::post('/admin/pagos/user/filter', 'PagoController@filter');
