@extends('frontend/master/master')
@section('main')
<div class="container ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div>
                <h1 style="color: red">Tiêu đề: {{$post->title}}</h1>
                <img width="600px" height="300px" src="uploads/{{$post->image}}">
                <p style="margin-top:20px;">{!!$post->content!!}</p>
            </div>
        </div>
    </div>
    <div id="comment-content" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Bình luận bài viết</h3>
            <form method="post" role="form">
                @csrf
                @if(Auth()->check())
                <legend>Xin chao: {{Auth()->user()->firstName}}</legend>
                @else
                <a href="/login">
                    <h4>Đăng nhập để bình luận</h4>
                </a>
                @endif
                <div class="form-group">
                    <label>Nội dung:</label>
                    <input type="hidden" value="{{$post->id}}" name="post_id">
                    <textarea name="body" id="comment-body" required class="form-control" placeholder="Nhập comment (*)"></textarea>
                </div>
                <button id="btn-comment" type="button" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
    <!--	End Comment	-->

    <!--	Comments List	-->
    <br>

    <div id="comment">
        @foreach($post->comments as $comment)
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
    </div>
</div>

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        var _csrf = '{{csrf_token()}}';
        $('#btn-comment').click(function(e) {
            e.preventDefault();
            let body = $('#comment-body').val();
            let commentUrl = '{{route("comment",$post->id)}}';
            $.ajax({
                type: "post",
                url: commentUrl,
                data: {
                    'body': body,
                    _token: _csrf
                },
                success: function(response) {
                    $('#comment').html(response)
                },
            });
        })

        $('.deleteComment').click(function(){
            let that = $(this);
            let urlRequest = $(this).data('url');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    $.ajax({
                        type: "delete",
                        url: urlRequest,
                        data: {
                            _token: _csrf
                        },
                        success: function(response) {
                            if (response.code == 200) {
                                that.parent().parent().remove();
                            }
                        }
                    });
                }
            })
        });
    })
</script>
@endsection
@endsection