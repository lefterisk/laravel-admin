<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset Admin Password</title>

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
				@if (count($errors) > 0)
					<div class="alert alert-danger animated tada" role="alert">
						<ul>
							@foreach ($errors->all() as $error)
								<li><strong>Whoops!</strong> {{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form name="resetPasswordForm" role="form" method="POST" action="{{ url('/admin/password/reset') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="token" value="{{ $token }}">

					<div class="form-group">
						<label for="email">E-Mail Address</label>
						<input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control input-lg" name="password">
					</div>

					<div class="form-group">
						<label for="password_confirmation">Confirm Password</label>
						<input type="password" class="form-control input-lg" name="password_confirmation">
					</div>

					<button type="submit" class="btn btn-warning btn-lg btn-block">Reset Password</button>
				</form>

			</div>
		</div>
	</div>

<!-- Scripts -->
<script src="{{ asset('/assets/laravel-admin/js/cms-vendor.min.js') }}"></script>
<script src="{{ asset('/assets/laravel-admin/js/cms-app.min.js') }}"></script>

</body>
</html>
