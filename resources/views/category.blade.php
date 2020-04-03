@extends('layouts.main')
@section('title')
    {{$category['name']}}
@endsection

@section('content')
    <link rel='stylesheet' href="{{asset('css/category.css')}}">
    
    <div class="text-container">
        <h1>{{$category['name']}}</h1>
        @auth
        <div class="new-post button-{{color($category['name'])}}">
            <a href='../{{Request::path()}}/create'><p> <span class='text'>New Post </span>
                <span class="iconify" data-icon="bx:bx-plus-circle" data-inline="false"></span>

            </p>    </a>

        </div>
        @endauth
    </div>

    <div class="posts">
        <ul>
           
            @foreach ($posts as $post)
            <a href='/posts/{{$post->id}}'>
            <li>
                <div class="container">
                    <div class='post-author'>
                        <img src="{{Gravatar::get(img($post['created_by']))}}">
                    </div>
                    <div class='post-title'>
                        <p class='title'>{{$post['title']}}</p>
                        <p>Created by <span class='author-name'>{{author($post['created_by'])}} </span><span class='post-date'> {{$post['updated_at']}}Z</span></p>
                    </div>
                    <div class='post-views'>
                    <!-- <div class="post-detail views"><span class="iconify" data-icon="ic:baseline-remove-red-eye" data-inline="false"></span> <span>37</span></div> -->
                    <div class="post-detail comments" style="color:{{$post['comments'] > 0 ? "#27AE60" : " "}}"><span class="iconify" data-icon="mdi:comment-text-multiple-outline" data-inline="false"></span> <span>{{$post['comments']}}</span></div>

                    </div>
                    <div class="hl"></div>
                </div>
            </li>
        </a>
            @endforeach
        </ul>
        
    </div>
    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <script src="{{asset('js/date.js')}}"></script>


@endsection         