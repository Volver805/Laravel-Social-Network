<?php

namespace App\Http\Controllers;

use App\Category;
use App\Board;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show($slug)
    {
        $category = Category::where('slug',$slug)->firstOrFail();
        $posts = app('App\Http\Controllers\PostController')->index($category['name']);
        return view('category',[
            'category' => $category,
            'posts' => $posts
            ]);
    }

 

}