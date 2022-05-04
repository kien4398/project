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

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">VN - EXPRESS - Reset Password</div>
				<div class="panel-body">

					<form role="form" method="post" action="{{route('ResetPasswordPost')}}">
						@csrf
						<input type="hidden" name="token" value="{{$token}}">
						<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" class="form-control" name="email" placeholder="Email address" value="{{ $email ?? old('email') }}">
							@if ($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
							@elseif (Session('error'))
							<span class="text-danger">
								{{ Session('error') }}
								</span>
							@endif
						</div>
						<div class="form-group">
							<label for="password">New Password</label>
							<input id="password" type="password" class="form-control" name="password" placeholder="Enter new password">
							@if ($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
							@endif
							<span class="text-danger"></span>
						</div>

						<div class="form-group m-0">
							<button type="submit" class="btn btn-primary btn-block">
								Đặt lại mật khẩu
							</button>
						</div>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</body>

</html>