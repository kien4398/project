@extends('backend/master/master')
@section('main')
@section('css')
<style>
    .avatar-wrapper {
        position: relative;
        height: 200px;
        width: 200px;
        margin: 50px auto;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 1px 1px 15px -5px black;
        transition: all .3s ease;
    }

    .avatar-wrapper:hover {
        transform: scale(1.05);
        cursor: pointer;
    }

    .avatar-wrapper:hover .profile-pic {
        opacity: .5;
    }

    .profile-pic {
        height: 100%;
        width: 100%;
        transition: all .3s ease;
    }

    .profile-pic:after {
        font-family: FontAwesome;
        content: "📱";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        font-size: 150px;
        background: #ecf0f1;
        color: #34495e;
        text-align: center;
    }

    .upload-button {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    .fa-arrow-circle-up {
        position: absolute;
        font-size: 234px;
        top: -17px;
        left: 0;
        text-align: center;
        opacity: 0;
        transition: all .3s ease;
        color: #34495e;
    }

    .fa-arrow-circle-up:hover .fa-arrow-circle-up {
        opacity: .9;
    }
</style>
@endsection
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý Bài viết</a></li>
            <li class="active">Thêm Bài viết</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Bài viết</h1>
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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{route('posts.create')}}">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="avatar-wrapper">
                                    <img class="profile-pic" src="" />
                                    <div class="upload-button">
                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                    <input name="image" class="file-upload" type="file" accept="image/*" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tên Bài viết</label>
                                <input name="title" class="form-control" value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <!-- <label>Tác giả</label> -->
                                <input type="hidden" name="user_id" class="form-control" value="">

                                <!-- <select name="user_id" class="form-control">
                                    {{!!showUser($users,0)!!}}
                                </select> -->
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="category_id" class="form-control">
                                    {{!!showCategory($categories,0,"",0)!!}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bài viết nổi bật</label>
                                <select name="featured" class="form-control">
                                    <option value=1 selected>Nổi bật</option>
                                    <option value=0>Không nổi bật</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">


                            <div class="form-group">
                                <label>Nội dung Bài viết</label>
                                <textarea id="content" name="content" class="form-control" >{{old('content')}}</textarea>
                                <script>
                                    CKEDITOR.replace('content')
                                </script>
                            </div>
                            <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->
@section('js')
<script>
    $(document).ready(function() {

        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function() {
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });
    });
</script>
@endsection
@endsection