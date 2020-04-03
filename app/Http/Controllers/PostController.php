<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index($category)
    {
        $posts = Post::where('category',$category)->orderBy('updated_at','desc')->get();
        foreach($posts as $post) {
            $post['comments'] = Comment::where('post',$post->id)->count();
        }
        return $posts;
    }

   
    public function create($categorySlug)
    {
        $category = Category::where('slug',$categorySlug)->firstOrFail();
        return view('create-post',[
            'category' => $category->name
        ]);
    }

 
    public function store(Request $request)
    {
        $user = auth()->user();
        $validated = request()->validate([
            'title' => 'required|min:4|max:255',
            'body' => 'required|min:10|max:14000',
            'category' => 'required',
        ]);
        $validated['created_by'] = $user->id;
        $category = Category::where('name',$validated['category'])->firstOrFail();
        Post::create($validated);
        return redirect('/boards/'.$category['slug']);
    
    }

   
    public function show(Post $post)
    {
        $comments = Comment::where('post',$post['id'])->simplePaginate(5);
        return view('post',['post' => $post,'comments' => $comments]);
    }


    public function update(Request $request, Post $post)
    {
        $user = auth()->user();
        if($user->id != $post['created_by']) 
            return redirect('/posts/'.$post->id);
        
        $validated = request()->validate([
            'post-title' => 'required|min:4|max:255',
            'post-body' => 'required|min:10|max:10000'
        ]);
        $post->title = $validated['post-title'];
        $post->body = $validated['post-body'];
        $post->save();
        return redirect('/posts/'.$post->id);
    }

    public function destroy(Post $post)
    {
        if(auth()->user()->id == $post['created_by']) {
            $category = $post['category'];
            $post->delete();   
            $category = Category::where('name',$category)->first();
            $message = "Post deleted";
            return redirect("boards/".$category['slug']);
        }
        else {
            return redirect("boards");
        }
    }

}
