<?php

namespace App\Http\Controllers;
Use App\Post;
Use App\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;
Use Image;
use Carbon\Carbon;

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

        foreach($posts as $key=>$post){
            $fechapub = new Carbon($post->updated_at);
            $fechapub = $fechapub->toFormattedDateString();
            $post->fechapub = $fechapub;
        }

        $meses = DB::select('select created_at, MONTH(created_at) as mesNum, MONTHNAME(created_at) as mes from posts group by mes order by mesNum');
        //$meses = $meses->groupby('mes');       
        //dd($meses);
        $post_related = DB::select('Select * from posts ORDER BY id DESC limit 3');
        foreach($post_related as $key=>$related){
            $fechapub = new Carbon($related->updated_at);
            $fechapub = $fechapub->toFormattedDateString();
            $related->fechapub = $fechapub;
            //dd($related);
        }
        foreach($meses as $key=>$mes){
            $obj = new Carbon($mes->created_at);
            $fecha = $obj->format('Y-m-d');
            $mesLargo = $obj->format('F');
            $mesNum = $obj->format('m');
            $postsMes = DB::table('posts')
                ->whereMonth('created_at',$mes->mesNum)->get();
            $mes->posts = $postsMes;
        }
        //dd($post_related);
        //dd($meses);
        return view('welcome',compact('posts','post_related','meses','postsMes','fechapub'));
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
