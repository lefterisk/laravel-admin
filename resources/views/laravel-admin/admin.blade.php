<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/assets/laravel-admin/css/cms-app.css') }}" rel="stylesheet">
	<link href="{{ asset('/assets/laravel-admin/css/cms-vendor.min.css') }}" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="skin-yellow">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<a href="{{ url('/admin') }}" class="logo"><b>Admin</b>LTE</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="hidden-xs">Alexander Pierce</span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('/admin/auth/logout') }}">Sign out</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">

				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
							<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
						</ul>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			@yield('content')
		</div><!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.0
			</div>
			<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
		</footer>
	</div><!-- ./wrapper -->

	{{--<nav class="navbar navbar-default">--}}
		{{--<div class="container-fluid">--}}
			{{--<div class="navbar-header">--}}
				{{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">--}}
					{{--<span class="sr-only">Toggle Navigation</span>--}}
					{{--<span class="icon-bar"></span>--}}
					{{--<span class="icon-bar"></span>--}}
					{{--<span class="icon-bar"></span>--}}
				{{--</button>--}}
				{{--<a class="navbar-brand" href="#">Laravel</a>--}}
			{{--</div>--}}

			{{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
				{{--<ul class="nav navbar-nav">--}}
					{{--<li><a href="{{ url('/') }}">Home</a></li>--}}
				{{--</ul>--}}

				{{--<ul class="nav navbar-nav navbar-right">--}}
					{{--@if (Auth::guest())--}}
						{{--<li><a href="{{ url('/admin/auth/login') }}">Login</a></li>--}}
					{{--@else--}}
						{{--<li class="dropdown">--}}
							{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>--}}
							{{--<ul class="dropdown-menu" role="menu">--}}
								{{--<li><a href="{{ url('/admin/auth/logout') }}">Logout</a></li>--}}
							{{--</ul>--}}
						{{--</li>--}}
					{{--@endif--}}
				{{--</ul>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</nav>--}}

	{{--@yield('content')--}}

	<!-- Scripts -->

	<script src="{{ asset('/assets/laravel-admin/js/cms-vendor.min.js') }}"></script>
	<script src="{{ asset('/assets/laravel-admin/js/cms-app.min.js') }}"></script>

</body>
</html>
