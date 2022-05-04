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
            <h1 class="page-header">Thêm quyền</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" method="post" action="{{route('permission.create')}}">
                            @csrf
                            <div class="form-group">
                                <label>Quyền</label>
                                <input name="permission" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Mô tả quyền</label>
                                <textarea name="display_name_permission" class="form-control" placeholder=""></textarea>
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