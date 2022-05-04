@foreach($comments as $comment)
<div class="media">
    <div class="media-left ">
        <img src="/image/{{$comment->user->image}}" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
        @if(Auth()->user() == $comment->user)
        <button type="button" class="deleteComment" data-url="{{route('comment.delete', $comment->id)}}">Xóa</button>
        @endif
        <h4 class="media-heading">{{$comment->user->userName}}</h4>
        <p>{{$comment->created_at}}</p>
        <p>{{$comment->body}}</p>
    </div>
</div>
@endforeach