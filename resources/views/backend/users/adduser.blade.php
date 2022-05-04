@extends('backend/master/master')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý thành viên</a></li>
            <li class="active">Thêm thành viên</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm thành viên</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                        @endif
                        <!-- <div class="alert alert-danger">Email đã tồn tại !</div> -->
                        <form role="form" method="post" enctype="multipart/form-data" action="{{route('user.create')}}">
                            @csrf
                            <div class="form-group">
                                <label>Avatar</label>

                                <input required name="image" type="file">
                                <br>
                                <div>
                                    <img src="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Họ</label>
                                <input name="lastName" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Tên đệm</label>
                                <input name="middleName" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input name="firstName" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>User name</label>
                                <input name="userName" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Vai trò</label>
                                <select name="role_id[]" class="js-example-basic-multiple" multiple="multiple" >
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->display_name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->
<script>
    $('.js-example-basic-multiple').select2();
</script>
@endsection