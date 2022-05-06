@extends('backend/master/master')
@section('main')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
@endsection

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">@lang('admin-user.ListUser')</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@lang('admin-user.ListUser')</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <button type="button" id="create" class="btn btn-success" data-toggle="modal" data-target="#user_target">
            <i class="glyphicon glyphicon-plus"></i>@lang('admin-user.AddUser')
        </button>
        <a href="{{route('user.trash')}}" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i>@lang('admin-user.Trash')</a>
    </div>

    <div>
        @if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>

    <div class="row" id="showww">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- <table id="table_user" data-toolbar="#toolbar" data-toggle="table"> -->
                    <table id="table_user" data-toolbar="#toolbar" class="table">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="image" data-sortable="true">@lang('admin-user.Avatar')</th>
                                <th data-field="lastName" data-sortable="true">@lang('admin-user.FullName')</th>
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
                                <td style="">{{$user->lastName.' '. $user->middleName.' '.$user->firstName}}</td>
                                <td style="">{{$user->userName}}</td>
                                <td style="">{{$user->email}}</td>
                                <td class="form-group">
                                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <!-- <a href="{{route('user.delete', $user->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a> -->
                                    <button type="button" class="deleteUser btn btn-danger" data-url="{{route('user.delete',$user->id) }}"><i class="glyphicon glyphicon-remove"></i></button>
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
<!--/.main-->
@include('backend/users/add_user')
@section('js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
<script>
    $(document).ready(function() {
        $('.deleteUser').click(function(e) {
            e.preventDefault();
            let that = $(this);
            let urlRequest = $(this).data('url');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "delete",
                        url: urlRequest,
                        success: function(response) {
                            if(response.code == 200){
                                that.parent().parent().remove();
                            }
                        }
                    });
                }
            })
            
        })
        $('table').DataTable({
            order: [0, 'asc']
        });
    });

    $(function() {

        $('#add_user').submit(function(e) {
            e.preventDefault()
            const fd = new FormData(this);
            $.ajax({
                url: "{{route('user.create')}}",
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Added!',
                            'User Added Successfully!',
                            'success'
                        )

                    }
                    $("#add_user")[0].reset();
                    location.reload();
                    // $("#user_target").modal('hide');
                }
            });
        });
    });
</script>

@endsection