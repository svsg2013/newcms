<?php

use Illuminate\Routing\Router;

$attributes = [
	'prefix'     => config('admin.route.prefix'),
	'middleware' => config('admin.route.middleware'),
];

app('router')->group($attributes, function ($router) {

	/* @var \Illuminate\Routing\Router $router */
	$router->namespace('App\Admin\Controllers')->group(function ($router) {

		/* @var \Illuminate\Routing\Router $router */
		$router->resource('auth/users', 'UserController');
		$router->resource('auth/roles', 'RoleController');
		$router->resource('auth/permissions', 'PermissionController');
		$router->resource('auth/menu', 'MenuController', ['except' => ['create']]);
		$router->resource('auth/logs', 'LogController', ['only' => ['index', 'destroy']]);
	});

	$authController = config('admin.auth.controller', AuthController::class);

	/* @var \Illuminate\Routing\Router $router */
	$router->get('auth/login', $authController.'@getLogin');
	$router->post('auth/login', $authController.'@postLogin');
	$router->get('auth/logout', $authController.'@getLogout');
	$router->get('auth/setting', $authController.'@getSetting');
	$router->put('auth/setting', $authController.'@putSetting');
});

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
	$router->resource('district', 'DistrictController');
	$router->resource('careers', 'CareerController');
	$router->resource('personal', 'PersonalController');
	$router->resource('loan', 'LoanController');
	$router->resource('income', 'IncomeController');
	$router->resource('personalloan', 'PersonalLoanController');
	$router->resource('loancalculator', 'LoanCalculatorController');
	$router->resource('fullprofile', 'FullProfileController');
  //  $router->get('/api/district', 'AjaxController@listDistrict');
});
