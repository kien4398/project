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
					@if (Session('message'))
					<div class="alert alert-success" role="alert">
						{{ Session('message') }}
					</div>
					@endif
					<form role="form" method="post" action="{{ route('ForgetPasswordPost') }}">
						@csrf
						<fieldset>
							<div>Nhập email</div>
							<br>
							<div class="form-group">
								<input class="form-control" placeholder="email" name="email" type="email" autofocus>
								<br>
								@if ($errors->has('email'))
								<span class="text-danger">{{$errors->first('email')}}</span>
								@endif
							</div>
							<button type="submit" class="btn btn-primary">Gửi</button>
							<br>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</body>

</html>