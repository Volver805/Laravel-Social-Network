@extends('layouts.main')
@section('title')
 {{$user->name}}   
@endsection
@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <div class="profile">
        @auth
        @if(Auth::user()->id == $user->id)
            <span class="iconify" data-icon="dashicons:edit" data-inline="false" onclick="edit()"></span>
        @endif
        @endauth
        <div class="wrapper">
            <img class="profile-picture" src="{{Gravatar::get($user->email,['size'=>200])}}">

            <div class="info info-toggle">            
                <h1>{{$user->name}}</h1>
                <p class="bio">{{$user->bio}}</p>
                <a href="{{$user->website}}" class="website">Visit my website</a>
            </div>
            @auth
            @if(Auth::user()->id == $user->id)
                <form method="POST" class='edit-form'>
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" id="name" value="{{$user->name}}">
                    <textarea name="bio" id="bio" placeholder="bio">{{$user->bio}}</textarea>
                    <input type="text" name="website" id="website" placeholder="Website" value="{{$user->website}}">
                    <input id='submit' value="Update" type="submit">
                </form>
            @endif
            @endauth
            <h2>Contributions</h2>
            <div class="posts">
                @foreach ($posts as $post)
                    <a href="/posts/{{$post->id}}">
                        <div class="post">
                            <p class='post-title'>{{$post->title}}</p>
                            <p class='post-date'>{{$post->created_at}}</p>
                            <div class="section">{{$post->category}}</div>
                        </div> 
                        
                    </a>   
                    <div class="hl"></div>

                @endforeach

            </div>
        </div>
    </div>
    <script>
        const edit = ()=> {
            console.log('working');
            document.querySelector('.edit-form').classList.toggle('form-toggle');
            document.querySelector('.info').classList.toggle('info-toggle');
        }
    </script>
@endsection