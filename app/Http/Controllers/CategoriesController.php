<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    	return view('pages.home',[
    		'title' => $category->name,
    		'posts' => $category->posts()->published()->paginate()
    	]);
    }
}
