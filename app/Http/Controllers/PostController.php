<?php

namespace App\Http\Controllers;
Use App\Post;
Use App\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;
Use Image;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );

        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categoria::all();
        return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $ruta = public_path().'/img/';
        $imagen_original = $request->file('imagen');
        $imagen = Image::make($imagen_original);
        $temp_name = $this->random_string() . '.' . $imagen_original->getClientOriginalExtension();
        $imagen->resize(300,300);
        $imagen->save($ruta . $temp_name, 100);
        $post->path = $temp_name;
        $post->slug = Str::slug($request->titulo);
        $post->categoria_id = $request->categoria;
        $post->user_id = Auth::user()->id;
        
        $post->save();
        flash('Post agregado con éxito!!','success')->important();
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts = Post::all();

        $meses = DB::select('select distinct MONTHNAME(posts.created_at) as mes,MONTH(created_at) as mesNum from posts order by mesNum');
        $post_related = DB::select('Select * from posts ORDER BY id DESC limit 3');
        foreach($meses as $mes){
            $pm = DB::table('posts')
                ->whereMonth('created_at',$mes->mesNum)
                ->get();
        }
        return view('welcome')->with('posts', $posts)->with('post_related',$post_related)->with('meses',$meses)->with('pm',$pm);
    }

    public function post($slug){
        $post = Post::where('slug','=',$slug)->firstOrFail();
        $post_related = DB::select('Select * from posts ORDER BY id DESC limit 3');
        return view('/post/post')->with('post',$post)->with('post_related',$post_related);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Categoria::all();
        return view('admin.posts.edit')->with('post',$post)->with('categories',$categories);
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
        $post = Post::find($id);
        $post->titulo = $request->get('titulo');
        $post->descripcion = $request->get('descripcion');
        $ruta = public_path().'/img/';
        $imagen_original = $request->file('imagen');
        $imagen = Image::make($imagen_original);
        $temp_name = $this->random_string() . '.' . $imagen_original->getClientOriginalExtension();
        $imagen->resize(600,500);
        $imagen->save($ruta . $temp_name, 100);
        $post->path = $temp_name;
        $post->slug = Str::slug($request->titulo);
        $post->categoria_id = $request->get('categoria');
        $post->user_id = Auth::user()->id;

        $post->save();
        flash('Post editado con éxito!!','warning')->important();
        return redirect('/admin/posts/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        flash('Post eliminado con éxito!!','danger')->important();
        return redirect('/admin/posts');
    }
}
