<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categoria::all();
        return view('admin.categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Categoria;
        $category->nombre = $request->nombre;
        $category->descripcion = $request->descripcion;
        $category->user_id = Auth::user()->id;
        
        $category->save();
        flash('Categoria creada con éxito!!','success')->important();
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categoria::find($id);
        return view('admin.categories.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Categoria::find($id);
        $category->nombre = $request->get('nombre');
        $category->descripcion = $request->get('descripcion');
        $category->user_id = Auth::user()->id;

        $category->save();
        flash('Categoria editada con éxito!!','warning')->important();
        return redirect('/admin/categories/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categoria::find($id);
        $category->delete();
        flash('Categoria eliminada con éxito!!','danger')->important();
        return redirect('/admin/categories/'); 
    }

    public function category($nombre){
        $category = Categoria::where('nombre','=',$nombre)->get();
        foreach($category as $cat){
            $posts = Post::where('categoria_id','=',$cat->id);
        }
        $post_related = DB::select('Select * from posts ORDER BY id DESC limit 3');
        return view('/categories/category',compact('post_related','category'));
    }
}
