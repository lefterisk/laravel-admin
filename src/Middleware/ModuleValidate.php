<?php namespace LaravelAdmin\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class ModuleValidate {

	public function __construct()
	{

	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$moduleFromRoute = $request->route()->getParameter('module');

		$moduleCamelcase  = ucfirst(camel_case($moduleFromRoute));

		$moduleClass      = 'LaravelAdmin\\' . $moduleCamelcase;

		$moduleConfig = Config::get('laravel-admin.models.' . $moduleCamelcase);

		if (empty($moduleConfig)) {
			abort(404, 'error.module_config_not_found');
		}

		if (!class_exists($moduleClass)) {
			abort(404, 'error.module_model_class_not_found');
		}

		return $next($request);
	}

}
