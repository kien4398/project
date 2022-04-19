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
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm bài viết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form id="add_posts" role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
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
                                        <input name="title" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Tác giả</label>
                                        <select name="user_id" class="form-control">
                                            {{!!showUser($users,0)!!}}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="category_id" class="form-control">
                                            {{!!showCategory($categories,0)!!}}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bài viết nổi bật</label>
                                        <select name="featured" class="form-control">
                                            <option value=1 selected>Nổi bật</option>
                                            <option value=0>Không nổi bật</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung Bài viết</label>
                                        <textarea id="content" name="content" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                

                                <button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    });
</script>