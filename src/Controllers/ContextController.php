<?php namespace LaravelAdmin\Controllers;


class ContextController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		var_dump('context');
	}
}
