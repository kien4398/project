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
            <h1 class="page-header">Danh sách Comment đã xóa</h1>
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
                                <th >ID</th>
                                <th >User</th>
                                <th >Bài viết</th>
                                <th>Nội dung</th>
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
                                    <a href="{{route('comment.untrash',$comment->id)}}" class="btn btn-primary">Khôi phục</a>
                                    
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
@endsection