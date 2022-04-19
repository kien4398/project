<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>vn express</title>
<base href="/backend/">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">VN - EXPRESS</div>
				<div class="panel-body">
					@if($errors->any())
						@foreach($errors->all() as $error)
					<div class="alert alert-danger">{{$error}}</div>
						@endforeach
					@endif
					<!-- <div class="alert alert-danger">Tài khoản không hợp lệ !</div> -->
					<form role="form" method="post">
						@csrf
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="User Name" name="userName" type="username" autofocus value="{{old('userName')}}">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="{{old('password')}}">
							<!-- </div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div> -->
							<button type="submit" class="btn btn-primary">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>
