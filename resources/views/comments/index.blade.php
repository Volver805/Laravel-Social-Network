@foreach ($comments as $comment)
    <div class="comment patch">
        <a href="/profile/{{$comment['created_by']}}">
            <div class='info'>
                <img src="{{Gravatar::get(img($comment['created_by']))}}" alt="" srcset="">
                <p class='post-author'>{{author($comment['created_by'])}}</p>
            <p class='post-date'>{{$comment['created_at']}}Z</p>
            </div>
            </a>
        <div class="text">
            <p>{{$comment['comment']}} </p>
        </div>
        @auth
        @if(Auth::user()->id == $comment['created_by']) 
            <a href="{{$comment['id']}}/comments/remove"><span class="iconify post-icon comment-delete" data-icon="ic:baseline-delete-forever" data-inline="false"></span></a>
        @else
        @endauth
        <span class="iconify  post-icon" data-icon="mdi:comment-text-multiple-outline" data-inline="false"></span>
        @endif
    
    </div>
@endforeach