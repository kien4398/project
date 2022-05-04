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
            <h1 class="page-header">Thêm vai trò</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <!-- <div class="alert alert-danger">Email đã tồn tại !</div> -->
                        <form role="form" method="post" action="{{route('role.create')}}">
                            @csrf
                            <div class="form-group">
                                <label>Vai trò</label>
                                <input name="role" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea name="display_name_role" class="form-control" placeholder=""></textarea>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                                <div class="row">
                                    <div class="card-body text-primary col-md-3">
                                        <h5 class="card-title">
                                            @foreach($permissions as $per)
                                            <label>
                                                <input name="permission_ids[]" type="checkbox" class="" value="{{$per->id}}"> {{$per->display_name}} 
                                            </label>
                                            @endforeach

                                        </h5>
                                    </div>

                                </div>
                        </div>
                    </div>

                    <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->
@endsection