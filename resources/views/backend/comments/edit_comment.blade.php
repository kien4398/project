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
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa comment</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" method="post" action="{{route('comment.update', $comment->id)}}">
                            @csrf
                            <div class="form-group">
                                <label>Comment</label>
                                <input name="body" class="form-control" value="{{$comment->body}}">
                            </div>
                    </div>
                    <button name="sbm" type="submit" class="btn btn-success">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->
@endsection