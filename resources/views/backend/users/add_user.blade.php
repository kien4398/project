
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
        content: "🙆‍♂️";
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
<div id="user_target" class="modal fade" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('admin-user.AddUser')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_user" role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="avatar-wrapper">
                            <img class="profile-pic" src="" />
                            <div class="upload-button">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input  name="image" class="file-upload" type="file" accept="image/*" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>@lang('admin-user.LastName')</label>
                        <input  type="text" name="last_name" class="form-control" placeholder="">

                    </div>
                    <div class="form-group">
                        <label>@lang('admin-user.MiddleName')</label>
                        <input  type="text" name="middle_name" class="form-control" placeholder="">

                    </div>
                    <div class="form-group">
                        <label>@lang('admin-user.FirstName')</label>
                        <input  type="text" name="first_name" class="form-control" placeholder="">

                    </div>
                    <div class="form-group">
                        <label>@lang('admin-user.UserName')</label>
                        <input  type="text" name="user_name" class="form-control" placeholder="">

                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input  type="email" name="email" type="text" class="form-control">

                    </div>
                    <div class="form-group">
                        <label>@lang('admin-user.Password')</label>
                        <input name="password" type="password" class="form-control">

                    </div>
                    <div class="form-group">
                            <label>@lang('admin-user.Role')</label>
                            <select name="role_id[]" class="js-example-basic-multiple" multiple="multiple">
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    <button id="btn_add_user" name="sbm" type="submit" class="btn btn-success">@lang('admin-user.AddNew')</button>
                    <button type="reset" class="btn btn-default">@lang('admin-user.Refresh')</button>
                </form>
            </div>
        </div>
    </div>
</div>

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

        $('.js-example-basic-multiple').select2({
            dropdownParent: $("#user_target")
        });
    });
</script>