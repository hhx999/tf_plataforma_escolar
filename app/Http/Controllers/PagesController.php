<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function home()
    {
    	$posts = Post::published()->paginate();
    	return view('pages.home', compact('posts'));
    }
    public function about()
    {
    	return view('pages.about');
    }
    public function archive()
    {
    	return view('pages.archive', [
            'docentes' => User::latest()->take(4)->get(),
            'categories' => Category::all(),
            'posts' => Post::latest()->take(5)->get()
        ]);
    }
    public function contact()
    {
    	return view('pages.contact');
    }
}
