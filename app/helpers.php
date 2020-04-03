<?php
    use App\Post;
    use App\User;
    use App\Category;
    use App\Board;

    function latestPost($category) {
        return Post::where('category',$category)->orderBy('created_at','desc')->limit(1)->first();
    }
    function author($user) {
        return User::find($user)->name;
    }
    function img($user) {
        return User::find($user)->email;
    }

    //get the latest posts created from all categories 
    function latestPosts($num) {
        $posts = Post::orderBy('created_at','desc')->limit($num)->get();
        return $posts;
    }
    function color($category) {
        $category = Category::where('name',$category)->first();
        return Board::find($category->board)->color;
    }
    // get the post with most comments in the last 24 hrs
    function featuredPost() {
        
    }
?>