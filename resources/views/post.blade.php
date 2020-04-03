@extends('layouts.main')
@section('title')
    {{$post['title']}}    
@endsection
@section('content')
    <style>
        .comment .info {
            width: 100% !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
    <div class="post patch">
        <div class='info'>
            <a href="/profile/{{$post['created_by']}}">
       
            <div class="responsive">
               <img src="{{Gravatar::get(img($post['created_by']))}}" alt="" srcset="">
                <p class='post-author'>{{author($post['created_by'])}}</p>
           </div>
        </a>
           <div class="responsive-title">
                <span class='post-title'>{{$post['title']}}</span>
                <p class='post-date'>{{$post['created_at']}}Z</p>
            </div>
        </div>
        
        <div class='text'>
            <div class="text-details">
                <h1>{{$post['title']}}</h1>
                <p>{{$post['body']}}</p>
            </div>
            @auth
            @if(Auth::user()->id == $post['created_by']) 
            <form method="POST" class='post-edit-form' autocomplete="off">
                @csrf
                @method('PUT')
                <input type="text" name="post-title" id="post-title-edit" value="{{$post['title']}}">
                <textarea name="post-body" id="post-body-edit">{{$post['body']}}</textarea>
                <button class='post-edit-button'>Edit</button>
            </form>
            @endif
            @endauth
        </div>
        @auth
        @if(Auth::user()->id == $post['created_by']) 
        <span class="iconify post-icon post-options" data-icon="feather:more-vertical" data-inline="false" onclick="options()"></span>   
        <div class="options">
            <a class='post-edit' onclick='postEdit()'>Edit <span class="iconify" data-icon="bx:bxs-pen"></span></a>
            <a href='{{$post['id']}}/remove' class='post-delete'>Delete <span class="iconify" data-icon="gridicons:cross"></span></a>    
        </div>  
        @else 
        <span class="iconify  post-icon" title="post" data-icon="mdi:post-outline" data-inline="false"></span>
        @endif
        @endauth
        @guest 
        <span class="iconify  post-icon" title="post" data-icon="mdi:post-outline" data-inline="false"></span>
        @endguest
    </div>
    <div class="comments-header">Comments</div>
    <div class="comments">
 
    <input type="hidden" id='last-post' value='0'>
    <input type="hidden" id="post-id" value={{$post['id']}}>
   
    </div>
    @auth
    <div class="new-comment-button" onclick='newComment()'>
            <span class="iconify" data-icon="entypo:reply"></span>
    </div>
    <div class="new-comment">

        <img src="{{Gravatar::get(Auth::user()->email)}}" alt="" srcset="">
        <h1>Write your reply</h1>
        <form action="/comment/create/{{$post['id']}}" method="post">
            @csrf
            <textarea name="comment" id="new-comment" cols="30" rows="10"></textarea>
            <button class='send-comment' type="submit">Send</button>
            <button class='cancel' type="button" onclick="newComment()">Cancel</button>

        </form>

    </div>
    @endauth
    <script src="{{asset('js/comments.js')}}"></script>
    <script src="{{asset('js/date.js')}}"></script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection