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
            <li class="active">Danh sách bài viết</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách bài viết</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        @can('add posts')
        <a data-toggle="modal" data-target="#exampleModalLong" href="" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm bài viết
        </a>
        @endcan
        @can('restore posts')
        <a href="{{route('posts.trash')}}" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i>Thùng rác</a>
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
                                <th data-field="name" data-sortable="true">Tên tiêu đề</th>
                                <th>Ảnh bài viết</th>
                                <th>Danh mục</th>
                                <th>Tác giả</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td style="">{{$post->id}}</td>
                                <td style="">{{$post->title}}</td>
                                <td style=""><img width="300" height="180" src="/uploads/{{$post->image}}" /></td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->user->firstName}}</td>
                                <td class="form-group">
                                    @can('edit posts')
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    @endcan
                                    @can('delete posts')
                                    <!-- <a href="{{route('posts.delete', $post->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a> -->
                                    <button type="button" class="deletePost" data="{{$post->id}}">DEL</button>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $(this).attr('data');
            $.ajax({
                type: "delete",
                url: "/admin/posts/delete/"+id,
                success: function (response) {
                    location.reload();
                    alert("Delete Success!")
                }
            });
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
                    if (response.status == 200) {
                        Swal.fire(
                            'Added!',
                            'User Added Successfully!',
                            'success'
                        )
                    }
                    $('#add_posts')[0].reset();
                    // $('#exampleModalLong').modal('hide');
                }
            });
        });
    });
</script>
@endsection