@extends('layouts.main') 
    @section('title')
        Home
    @endsection
    @section('content')
    <style>
        body {
            background-color:white !important; 
        }
    </style>
    <div class="jumptron">

        <div class="content">
            <h1>A Community from and for Developers</h1>
            <a href='{{URL::to('/boards')}}'><button class='button-view'>View Boards</button></a>
            @auth
            <a href={{URL::to('/profile/'.Auth::user()->id)}}><button class='button-ask'>View profile</button></a>
            @endauth
            @guest
            <a href={{URL::to('/register')}}><button class='button-ask'>Join now</button></a>
            @endguest
        </div>

        <div class="bottom">
            <div class="container">
                <div class="wrapper">
                    <p>Featured Post</p>
                    <a href='#' class='post-title'>How to land a job in the teach industry </a><br>
                    <span class="iconify comments-icon" data-icon="mdi:comment-outline" data-inline="false"></span><span class='comments-number'>  24</span> <span class='post-date'>3 hours ago</span>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-posts">
        @php
            $posts = latestPosts(4);    
        @endphp
        <div class="container">
            <h1>Latest Posts</h1>   
            <div class='bl'></div>
            <div class="p">
                @foreach ($posts as $post)
                        <div class="post" value="{{$post->id}}">
                            <a href="posts/{{$post->id}}">
                                <h3 class='post-title'>{{$post->title}}</h3>
                                <span href='#' class='post-author'>by {{author($post->created_by)}}</span> <span style='float:right' href=# class='post-date'>{{$post->created_at}}Z</span>
                                <button class='post-category button-{{color($post->category)}}' >{{$post->category}}</button>
                            </a>

                        </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{asset('js/date.js')}}"></script>
    @endsection