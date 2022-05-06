@extends('backend/master/master')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@lang('admin-comment.ListComments')</h1>
        </div>
        <div>
            <a href="{{route('comment.trash')}}" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i>@lang('admin-comment.Trash')</a>
        </div>
    </div>
    <div class="row" id="showww">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- <table id="table_user" data-toolbar="#toolbar" data-toggle="table"> -->
                    <table id="table_user" data-toolbar="#toolbar" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>@lang('admin-comment.Author')</th>
                                <th>@lang('admin-comment.Post')</th>
                                <th>@lang('admin-comment.Content')</th>
                                <th>@lang('admin-comment.Action')</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            @foreach($comments as $comment)
                            <tr>
                                <td style="">{{$comment->id}}</td>
                                <td style="">{{$comment->user->userName}}</td>
                                <td style="">{{$comment->post->title}}</td>
                                <td style="">{{$comment->body}}</td>
                                <td class="form-group">
                                    <a href="{{route('comment.edit',$comment->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <button type="button" data-url="{{route('comment.delete',$comment->id)}}" class="btn btn-danger comment-delete"><i class="glyphicon glyphicon-remove"></i></button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->
</div>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        
        $('.comment-delete').click(function(e) {
            e.preventDefault();
            let that = $(this);
            let commentDelUrl = $(this).data('url');
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
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "delete",
                        url: commentDelUrl,
                        success: function(response) {
                            if(response.code == 200){
                                that.parent().parent().remove();
                            }
                        }
                    });
                }
            })
        })
        
    })
</script>
@endsection
@endsection