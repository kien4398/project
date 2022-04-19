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
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <button type="button" id="create" class="btn btn-success" data-toggle="modal" data-target="#user_target">
            <i class="glyphicon glyphicon-plus"></i>Thêm thành viên
        </button>
        <a href="{{route('user.trash')}}" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i>Thùng rác</a>
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
                                <th data-field="image" data-sortable="true">Avatar</th>
                                <th data-field="lastName" data-sortable="true">Họ</th>
                                <th data-field="middleName" data-sortable="true">Tên đệm</th>
                                <th data-field="firstName" data-sortable="true">Tên</th>
                                <th data-field="userName" data-sortable="true">User name</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th>Hành động</th>
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
                                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{route('user.delete', $user->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    <button type="button" class="deleteUser" data="{{ $user->id }}">Del</button>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $(this).attr('data')
            $.ajax({
                url: '/admin/user/deletee/' + id,
                type: "delete",
                success: function(response) {
                    location.reload()
                    alert('delete user success !')
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
    //     var form = $('#add_user');
    //     var image = form.find('.image').first().val();
    //     var last_name = form.find('.last_name').first().val();
    //     var middle_name = form.find('.middle_name').first().val();
    //     var first_name = form.find('.first_name').first().val();
    //     var user_name = form.find('.user_name').first().val();
    //     var email = form.find('.email').first().val();
    //     var password = form.find('.password').first().val();
    //     $.ajax({
    //         type: "POST",
    //         url: "{{route('user.create')}}",
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         data: {
    //             image: image,
    //             last_name: last_name,
    //             middle_name: middle_name,
    //             first_name: first_name,
    //             user_name: user_name,
    //             email: email,
    //             password: password
    //         },
    //         dataType: 'json',
    //         success: function(response) {

    //         },
    //     })
    // })
</script>

@endsection