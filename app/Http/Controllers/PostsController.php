<?php

namespace PlataformaEDUCA\Http\Controllers;

use PlataformaEDUCA\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function show(Post $post)
    {
    	return view('posts.show',compact('post'));
    }
}
