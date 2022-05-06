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
    <div class="row" id="showww">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="table_user" data-toolbar="#toolbar" data-toggle="table">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="image" data-sortable="true">@lang('admin-user.Avatar')</th>
                                <th data-field="lastName" data-sortable="true">@lang('admin-user.LastName')</th>
                                <th data-field="middleName" data-sortable="true">@lang('admin-user.MiddleName')</th>
                                <th data-field="firstName" data-sortable="true">@lang('admin-user.FirstName')</th>
                                <th data-field="userName" data-sortable="true">@lang('admin-user.UserName')</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th>@lang('admin-user.Action')</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            @foreach($users as $user)
                            <tr>
                                <td style="">{{$user->id}}</td>
                                <td style="text-align: center"><img width="130" height="130" src="/image/{{$user->image}}" /></td>
                                <td style="">{{$user->lastName}}</td>
                                <td style="">{{$user->middleName}}</td>
                                <td style="">{{$user->firstName}}</td>
                                <td style="">{{$user->userName}}</td>
                                <td style="">{{$user->email}}</td>
                                <td class="form-group">
                                <a href="{{route('user.untrash', $user->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> @lang('admin-user.Restore')</a>
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

</div>

@endsection