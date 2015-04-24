<?php namespace LaravelAdmin\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ModuleController extends Controller
{
	protected $moduleName;
	protected $moduleClass;
	protected $moduleConfig;

	public function __construct()
	{
		$this->middleware('LaravelAdmin\Middleware\Authenticate');
		$this->middleware('LaravelAdmin\Middleware\ModuleValidate');
	}

	public function index($module, $parentId = null)
	{
		$this->_moduleAssignment($module);

		$sort          = Input::get('sort_by');
		$sortDirection = Input::get('sort_direction');
		$page          = Input::get('page');

//		$currentPage = 2;
//		Paginator::currentPageResolver(function() use ($currentPage) {
//			return $currentPage;
//		});

		$class = $this->moduleClass;
		$items = $class::paginate(20);

		$data = [
			'module'         => $module,
			'items'          => $items,
			'listingColumns' => ['name','status']
		];

		return view('admin::module.listing', $data);
	}

	public function add($module, $parentId = null)
	{
		$this->_moduleAssignment($module);

		if (!empty($parentId)) {

		}


		$data = [
			'module' => $module,
			'form_config' => $this->moduleConfig['form']
		];

		return view('admin::module.add', $data);
	}

	public function edit($module, $id = null)
	{
		$this->_moduleAssignment($module);
		var_dump( 'edit'. $module. $id );

		$data = [];

		return view('admin::module.edit', $data);
	}

	public function delete($module, $id = null)
	{
		$this->_moduleAssignment($module);
		var_dump( 'delete' . $module. $id );
	}

	public function deleteMultiple($module)
	{
		$this->_moduleAssignment($module);
		var_dump( 'deleteMultiple' . $module);
	}

	private function _moduleAssignment($module)
	{
		$this->moduleName   = ucfirst(camel_case($module));
		$this->moduleClass  = 'LaravelAdmin\\' . $this->moduleName;
		$this->moduleConfig = Config::get('laravel-admin.models.' . $this->moduleName);
	}
}
