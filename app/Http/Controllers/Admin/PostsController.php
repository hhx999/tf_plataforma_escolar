<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use App\Category;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::allowed()->get();

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
        $this->authorize('create', new Post);

        $this->validate($request,[
            'title' => 'required|min:5'
        ]);
        $post = Post::create( $request->all() );

        return redirect()->route('admin.posts.edit',$post);
    }    
    public function edit(Post $post)
    {
        $this->authorize('update',$post);

        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.posts.edit', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'post' => $post
        ]);
    }
    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update',$post);

        $post->update($request->all());

        $post->syncTags($request->tags);

        return redirect()->route('admin.posts.edit',$post)->with('flash', 'La publicación ha sido guardada.');
    }
    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);

        $post->delete();
        
        return redirect()
                    ->route('admin.posts.index')
                    ->with('flash', 'La publicación ha sido eliminada.');
    }
}
