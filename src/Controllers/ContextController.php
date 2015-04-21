<?php namespace LaravelAdmin\Controllers;


class ContextController extends Controller {

	public function __construct()
	{
		$this->middleware('LaravelAdmin\Middleware\Authenticate');
	}

	public function index($context)
	{
		var_dump('context '.$context);
	}
}
