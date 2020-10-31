<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use App\Category;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    //
    public function index()
    {
    	$posts = Post::all();
    	return view('admin.posts.index', compact('posts'));
    }
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
    	return view('admin.posts.create', compact('categories','tags'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);
        $post = Post::create($request->only('title'));
        
        return redirect()->route('admin.posts.edit',$post);
    }    
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.posts.edit', compact('categories','tags', 'post'));
    }
    public function update(Post $post, Request $request)
    {
        //validación
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'excerpt' => 'required',
        ]
        );

        $post->title = $request->title;
        $post->body = $request->body;
        $post->iframe = $request->iframe;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->published_at ? Carbon::parse($request->published_at) : null;
        $post->category_id = $request->category;
        $post->save();
 
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.edit',$post)->with('flash', 'Tu publicación ha sido guardada.');
    }
}
