@extends('layouts.main')
    @section('title') 
        boards
    @endsection
    @section('content')
        <style>
         
        </style>
  
        <div class="jumptron" id='boards-jumptron'>
            <div class="content" id='boards-content'>
                <h1>Boards</h1>
                <div class="l"></div>
                <p>All boards and subboards will appear here </p>
            </div>
            <div class="footer"></div>

        </div>
        <div class="flex-wrapper">
        <div class="boards">
            @foreach ($boards as $board)
            <div class="board board-{{$board->color}}">
                <h1>{{$board->name}} </h1>
                <div class="line">
                    <div class="l"></div>
                    <div class="circle"> </div>
                </div>
                <ul>
                    @foreach ($categories[$board->name] as $category)
                    @php
                        $latest = latestpost($category->name);
                        if($latest) {
                            $title = $latest->title;
                            $author = author($latest->created_by);
                            $date = $latest->created_at;
                        } else {
                            $title = "No posts yet";
                            $author = "none";
                            $date = 0;
                        }
                    @endphp
                        <a href='{{URL::to("/boards/".$category->slug)}}'><li><p class='sub-title'>{{$category->name}}</p>
                            <div class='sub-latest'>
                                <p class='post-title'>{{$title}}</p>
                                <p class="post-info">update by {{$author}} @if ($latest)
                                    <span class='post-date'>{{$date }}Z</p>
                                @endif
                            </div>
                        </li></a>
                    @endforeach
                  
                </ul>

            </div>
            @endforeach
      
        </div>
    <div class="side-menus">
        <div class="latest-posts">
            @php
                $posts = latestposts(3);
            @endphp
            <h1>Latest Posts</h1>
            <div class="hr"></div>
            @foreach ($posts as $post)
                <div class="post">
                <a href='/posts/{{$post->id}}'><p class='title'>{{$post->title}}</p>
                    <p class='date'>by {{author($post->created_by)}} <span class='post-date'>{{$post->created_at}}Z</span></p>
                </div></a>
            @endforeach
        </div>
    </div>
</div>

<script src="{{asset('js/date.js')}}"></script>

@endsection