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

    <div id="show_tb" class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

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
                                    <a href="/admin/posts/untrash/{{$post->id}}" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Khôi phục</a>
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

@endsection