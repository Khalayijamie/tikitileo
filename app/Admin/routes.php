<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('events', EventController::class);
    $router->resource('users', UserController::class);
    $router->resource('tickets', TicketController::class);
    $router->resource('payments', PaymentController::class);
    $router->resource('installments', InstallmentsController::class);
    $router->resource('organizers', OrganizersController::class);



});
