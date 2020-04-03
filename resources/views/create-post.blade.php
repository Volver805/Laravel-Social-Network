@extends('layouts.main')
@section('title')
 New post   
@endsection
@section('content')
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
    <div class="create">
        <div class="container">
            <h1>Create a new post</h1>
            <form action="/boards" method='POST'>
                @csrf
                <input autocomplete="off" class='form-field' type="text" name="title" id="title" placeholder="Post title" value="{{old('title')}}" onkeyup="previewTitle()" maxlength="200">
                <textarea class='form-field' type="text" name="body" id="body" placeholder="Write your post here.." onkeyup="previewBody()">{{old('body')}}</textarea>
                <input type="submit" value="Post" id='post-button'>
                <input type="hidden" name="category" value="{{$category}}">
            </form>
        </div>
    </div>
    <div class="comment patch">
        <div class='info'>
            <div class="responsive">
                <img src="{{Gravatar::get(Auth::user()->email)}}" alt="" srcset="">
                <p class='post-author'>{{author(Auth::user()->id)}}</p>
           </div>
        </div>
        <div class='text'>
        <h1 class='preview-title'>
            @if($errors->first('title'))
            @error('title')
                <span class='error'>
                    {{$message}}
                </span>
            @enderror
            @else 
                {{old('title')}}
            @endif
        </h1>
            <p id='preview-body'> 
            @if($errors->first('body'))
                @error('body')
                    <span class='error'>
                        {{$message}}
                    </span>
                @enderror
            @else 
                    {{old('body')}}
            @endif
            </p>
        </div>
        <span class="iconify post-icon" title="post" data-icon="mdi:post-outline" data-inline="false"></span>
    </div>

    <script src='{{asset('js/preview.js')}}'></script>
@endsection