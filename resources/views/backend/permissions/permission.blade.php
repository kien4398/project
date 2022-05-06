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
            <h1 class="page-header">@lang('admin-permission.ListPermissions')</h1>
        </div>
    </div>
    <div id="toolbar" class="btn-group">
        <a href="{{route('permission.add')}}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>@lang('admin-permission.Add')</a>
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
                                <th >@lang('admin-permission.PermissionName')</th>
                                <th >@lang('admin-permission.PermissionDescription')</th>
                                <th>@lang('admin-permission.Action')</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            @foreach($permissions as $permission)
                            <tr>
                                <td style="">{{$permission->id}}</td>
                                <td style="">{{$permission->name}}</td>
                                <td style="">{{$permission->display_name}}</td>
                                <td class="form-group">
                                    <a href="{{route('permission.edit',$permission->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{route('permission.delete',$permission->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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