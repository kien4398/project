@extends('backend/master/master')
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý thành viên</a></li>
            <li class="active">{{$user->firstName}}</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thành viên: {{$user->firstName}}</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <!-- <div class="alert alert-danger">Email đã tồn tại, Mật khẩu không khớp !</div> -->
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif

                    <form role="form" method="post" enctype="multipart/form-data" action="{{route('user.update', $user->id)}}">
                        @csrf    
                        <div class="form-group">
                            <label>Avatar</label>

                            <input name="image" type="file">
                            <br>
                            <div>
                                <img width="300px" height="300px" src="/image/{{$user->image}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Họ</label>
                            <input name="lastName" class="form-control" placeholder="" value="{{$user->lastName}}">
                        </div>
                        <div class="form-group">
                            <label>Tên đệm</label>
                            <input name="middleName" class="form-control" placeholder="" value="{{$user->middleName}}">
                        </div>
                        <div class="form-group">
                            <label>Tên</label>
                            <input name="firstName" class="form-control" placeholder="" value="{{$user->firstName}}">
                        </div>
                        <div class="form-group">
                            <label>User name</label>
                            <input name="userName" class="form-control" placeholder="" value="{{$user->userName}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Vai trò</label>
                            <select name="role_id[]" class="js-example-basic-multiple" multiple="multiple">
                                @foreach($roles as $role)
                                <option 
                                {{$roleOfUser->contains('id', $role->id) ? 'selected' : ''}}
                                value="{{$role->id}}">{{$role->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button name="sbm" type="submit" class="btn btn-success">Sửa</button>
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
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection