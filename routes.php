<?php
/**
 * Admin routes
 */
Route::group(['prefix' => 'admin','namespace' => 'LaravelAdmin\Controllers'], function()
{
    Route::any('/', ['as'=> 'admin', 'uses' => 'DashboardController@index']);

    Route::any('context/{context}', ['as'=> 'admin.context', 'uses' => 'ContextController@index']);

    Route::group(['prefix' => 'module'], function()
    {
        Route::any('{module}',                 ['as' => 'admin.module', 'uses' => 'ModuleController@index'])->where(['module' => '[a-zA-Z][a-zA-Z0-9_-]*']);
        Route::any('{module}/add',             ['as' => 'admin.module.add', 'uses' => 'ModuleController@add'])->where(['module' => '[a-zA-Z][a-zA-Z0-9_-]*']);

        Route::any('{module}/parent/{id}',     ['as' => 'admin.module.parent', 'uses' => 'ModuleController@index'])->where(['id' => '[0-9_-]*', 'module' => '[a-zA-Z][a-zA-Z0-9_-]*', 'page' => '[0-9]+']);
        Route::any('{module}/parent/{id}/add', ['as' => 'admin.module.parent.add', 'uses' => 'ModuleController@add'])->where(['id' => '[0-9_-]*', 'module' => '[a-zA-Z][a-zA-Z0-9_-]*']);

        Route::any('{module}/{id}/edit',       ['as' => 'admin.module.edit', 'uses' => 'ModuleController@edit'])->where(['id' => '[0-9_-]*', 'module' => '[a-zA-Z][a-zA-Z0-9_-]*']);
        Route::any('{module}/{id}/delete',     ['as' => 'admin.module.delete', 'uses' => 'ModuleController@delete'])->where(['id' => '[0-9_-]*', 'module' => '[a-zA-Z][a-zA-Z0-9_-]*']);

        Route::any('{module}/delete-multiple', ['as' => 'admin.module.delete-multiple', 'uses' => 'ModuleController@deleteMultiple'])->where(['module' => '[a-zA-Z][a-zA-Z0-9_-]*']);
    });

    Route::controllers([
        'auth'     => 'AuthController',
        'password' => 'PasswordController',
    ]);

});