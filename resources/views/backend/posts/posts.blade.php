@extends('backend/master/master')
@section('main')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
@endsection

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">@lang('admin-post.ListPosts')</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@lang('admin-post.ListPosts')</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        @can('add_post')
        <!-- <a data-toggle="modal" data-target="#exampleModalLong" href="" class="btn btn-success"> -->
        <a href="{{route('posts.add')}}" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> @lang('admin-post.Add')
        </a>
        @endcan
        @can('restore_post')
        <a href="{{route('posts.trash')}}" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i>@lang('admin-post.Trash')</a>
        @endcan
    </div>
    <div>
        @if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <div id="show_tb" class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">@lang('admin-post.Title')</th>
                                <th>@lang('admin-post.Image')</th>
                                <th>@lang('admin-post.Category')</th>
                                <th>@lang('admin-post.Author')</th>
                                <th>@lang('admin-post.Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td style="">{{$post->id}}</td>
                                <td style="">{{$post->title}}</td>
                                <td style=""><img width="300" height="180" src="/uploads/{{$post->image}}" /></td>
                                <td>{{$post->category->name}}</td>
                                <td>{{optional($post->user)->userName}}</td>

                                <td class="form-group">
                                    @can('edit_post')
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    @endcan
                                    <!-- <a href="{{route('posts.delete', $post->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a> -->
                                    @can('delete_post')
                                    <button type="button" class="deletePost btn btn-danger" data-url="{{route('posts.delete',$post->id)}}"><i class="glyphicon glyphicon-remove"></i></button>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>

@include('backend/posts/add_posts')
<!--/.main-->
@section('js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
<script>
    $(document).ready(function() {
        $('.deletePost').click(function() {
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
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "delete",
                        url: urlRequest,
                        success: function(response) {
                            if (response.code == 200) {
                                that.parent().parent().remove();
                            }
                        }
                    });
                }
            })

        })
        $('table').DataTable({
            order: [0, 'desc']
        });
    });
    $(function() {
        $('#add_posts').submit(function(e) {
            e.preventDefault();

            const frm = new FormData(this);
            $.ajax({
                url: "{{route('posts.store')}}",
                method: "post",
                data: frm,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.code == 200) {
                        Swal.fire(
                            'Added!',
                            'User Added Successfully!',
                            'success'
                        )

                        $('#add_posts')[0].reset();
                    }
                    location.reload()
                    // $('#exampleModalLong').modal('hide');
                }
            });
        });
    });
</script>
@endsection