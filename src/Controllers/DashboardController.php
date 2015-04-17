<?php namespace LaravelAdmin\Controllers;


class DashboardController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		var_dump('dashboard');
	}
}
