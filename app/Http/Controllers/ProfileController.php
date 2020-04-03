<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user) {
       $posts = Post::where('created_by',$user->id)->get();
       return view('profile',["user" => $user,"posts" => $posts]);
    }
    public function update(Request $request,User $user) {
        if($user->id != auth()->user()->id) 
            return redirect('/boards');
        $validated = request()->validate([
            'name' => 'required|min:3|max:25'
        ]);
        $user->name = $validated['name'];
        $user->bio = $request['bio'];
        $user->website = $request['website'];
        $user->save();
        return redirect('/profile/'.$user->id);
    }
}