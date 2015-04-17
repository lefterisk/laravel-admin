<?php namespace LaravelAdmin\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ModuleController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index($module, $parentId = null)
	{
		$sort          = Input::get('sort_by');
		$sortDirection = Input::get('sort_direction');
		$page          = Input::get('page');

		$moduleCamelcase  = str_replace(' ', '', ucwords(str_replace('_', ' ', $module)));
		$moduleConfigPath = app_path(Config::get('app.model_config_path') . '/' . $moduleCamelcase . '.php');
		$moduleClass      = 'App\\' . $moduleCamelcase;

		if (!File::exists($moduleConfigPath)) {
			abort(404, 'error.module_config_not_found');
		}

		if (!class_exists($moduleClass)) {
			abort(404, 'error.module_model_class_not_found');
		}

		$moduleConfig = require_once($moduleConfigPath);

//		$currentPage = 2;
//		Paginator::currentPageResolver(function() use ($currentPage) {
//			return $currentPage;
//		});

		$items = $moduleClass::paginate(20);

		$data = [
			'items' => $items,
			'listingColumns' => ['name','status']
		];

		return view('admin.module.listing', $data);
	}

	public function add($module, $parentId = null)
	{
		if (!empty($parentId)) {
			var_dump( $module . ' add with parentId =' . $parentId);
		} else {
			var_dump( 'add'. $module );
		}
	}

	public function edit($module, $id = null)
	{
		var_dump( 'edit'. $module. $id );
	}

	public function delete($module, $id = null)
	{
		var_dump( 'delete' . $module. $id );
	}

	public function deleteMultiple($module)
	{
		var_dump( 'deleteMultiple' . $module);
	}
}
