<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Comment;
use Gravatar;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function index(Request $request) {
        if(Auth::check()) {
            $user = Auth::user()->id;
        }else {
            $user = 0;
        }
        $comments = Comment::where('post',$request->post)->where('id','>',$request->id)->limit(5)->get();
        foreach ($comments as $comment) {
            $comment['author'] = User::find($comment['created_by'])->name;
            $comment['grav'] = Gravatar::get(img($comment['created_by']));
            if($user == $comment['created_by'] && $user != 0) {
                $comment['owned'] = true;
            } 
        }
        return $comments;
    }   

    public function store($post)  {
        $user = auth()->user();
        $validated = request()->validate([
            'comment' => 'required|min:3|max:10000'
        ]);
        $validated['post'] = $post;
        $validated['created_by'] = $user->id;
        Comment::create($validated);
        return redirect('/posts/'.$post);
    }


    public function destroy(comment $comment)
    {
        if(auth()->user()->id == $comment['created_by']) {
            $post = $comment['post'];
            $category = $comment['category'];
            $comment->delete();   
            $message = "comment deleted";
            return redirect("posts/".$post);
        }
        else {
            return redirect("boards");
        }
    }
}
