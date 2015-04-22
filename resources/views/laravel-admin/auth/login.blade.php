<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>

	<link href="{{ asset('/assets/laravel-admin/css/cms-app.css') }}" rel="stylesheet">
	<link href="{{ asset('/assets/laravel-admin/css/cms-vendor.min.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<div id="loginWrapper" class="fullScreenOverlayDark">
	<div class="inner row">
		<div class="col-md-4 col-md-offset-4">

			<form name="loginForm" class="animated fadeIn" role="form" method="POST" action="{{ url('/admin/auth/login') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				@if (count($errors) > 0)
					<div class="alert alert-danger animated tada" role="alert">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<div class="form-group">
					<label for="username">Username</label>
					<input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control input-lg" name="password">
				</div>
				<div class="form-group" id="rememberMe">

					<label><input type="checkbox" class="icheck" name="remember"> Remember Me</label>
				</div>

				<button type="submit" class="btn btn-warning btn-lg btn-block"><i class="fa fa-user"></i> Login</button>

				<div class="form-group text-center">
					<a class="forgotPassword" href="{{ url('/admin/password/email') }}">Forgot Your Password?</a>
				</div>
			</form>

		</div>
	</div>
</div>

<!-- Scripts -->
<script src="{{ asset('/assets/laravel-admin/js/cms-vendor.min.js') }}"></script>
<script src="{{ asset('/assets/laravel-admin/js/cms-app.min.js') }}"></script>

</body>
</html>
