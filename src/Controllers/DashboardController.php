<?php namespace LaravelAdmin\Controllers;


class DashboardController extends Controller {

	public function __construct()
	{
		$this->middleware('LaravelAdmin\Middleware\Authenticate');
	}

	public function index()
	{
		var_dump('dashboard');
	}
}
