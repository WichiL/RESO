<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	return view('admin.publicaciones.index', compact('posts'));

    }

    public function create()
    {
    	$categories = Category::all();
    	$tags = Tag::all();
    	return view('admin.publicaciones.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);
        
        $post = Post::create([
            'title' => $request->get('title'),
            'url' => str_slug($request->get('url'))
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }
 
    public function edit(POST $post)
    {
        return view('admin.publicaciones.edit', compact('post')); 
    }



    // public function store(Request $request)
    // {
    // 	//validacion
    // 	$this->validate($request, [
    // 		'title' => 'required',
    // 		'body' => 'required',
    // 		'category' => 'required',
    // 		'excerpt' => 'required',
    // 		'tags' => 'required'
    // 	]);
    // 	// return Post::create($request->all());

    // 	$post = new Post;
    //     $post->title = $request->get('title');
    // 	$post->url = str_slug($request->get('title'));
    // 	$post->body = $request->get('body');
    // 	$post->excerpt = $request->get('excerpt');
    // 	$post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : null;
    // 	$post->category_id = $request->get('category');
    // 	$post->save();

    // 	$post->tags()->attach($request->get('tags'));
    // 	return back()->with('flash', "La publicación ha sido creada");
    // }
}
