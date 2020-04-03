<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Gravatar;

class LiveSearch extends Controller
{
    function action(Request $request) {
            $input = $request->all();
            $profiles = User::select('id','name','email')->where('name','like','%'.$input['name'].'%')->get(); 
            $posts = Post::select('id','title','created_by')->where('title','like','%'.$input['name'].'%')->get();
            foreach ($posts as $post) {
                $post['created_by'] = "by " . author($post['created_by']);
            }
            foreach($profiles as $profile) 
                $profile['email'] = Gravatar::get($profile['email']);
                
            return response()->json([
                'profiles' => $profiles,
                'posts' => $posts    
            ],200);
        }
}
