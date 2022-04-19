@extends('backend/master/master')
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý bài viết</a></li>
            <li class="active">{{$post['title']}}</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">bài viết: {{$post['title']}} </h1>
        </div>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" method="post" enctype="multipart/form-data" action="{{route('posts.update', $post['id'])}}">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Bài viết</label>
                                    <input name="title" class="form-control" placeholder="" value="{{$post['title']}}">
                                </div>
                                <div class="form-group">
                                    <label>Tác giả</label>
                                    <select name="user_id" class="form-control">
                                        {{!showUser($users,$post['user_id'])}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="category_id" class="form-control">
                                        {{showCategory($categories,$post['categories_id'])}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bài viết nổi bật</label>
                                    <select name="featured" class="form-control">
                                        <option @if($post['featured']==1) selected @endif value=1>Nổi bật</option>
                                        <option @if($post['featured']==0) selected @endif value=0>Không nổi bật</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh Bài viết</label>
    
                                    <input name="image" type="file">
                                    <br>
                                    <div>
                                        <img weight="150" height="150" src="/uploads/{{$post['image']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Nội dung Bài viết</label>
                                    <textarea id="content" name="content" class="form-control" rows="3">{{$post['content']}}</textarea>
                                    <script>
                                        CKEDITOR.replace('content');
                                    </script>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Sửa</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->

@endsection