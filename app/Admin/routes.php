<?php

use App\Admin\Controllers\BuildingController;
use App\Admin\Controllers\CompanyController;
use App\Admin\Controllers\RoomController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('companies',CompanyController::class);
    $router->resource('rooms',RoomController::class);
    $router->resource('buildings',BuildingController::class);


    // $router->resource('product',CompanyController::class);
    // $router->resource('supplies',CompanyController::class);
    // $router->resource('orders',CompanyController::class);


});
