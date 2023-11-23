<?php

namespace App\Utils;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use App\Controllers\HomeController;

abstract class Routes
{
    public static function allRoutes()
    {
        $routes = new RouteCollection();

        $route = new Route('/', [
            '_controller' => HomeController::class,
            '_method' => 'home'
        ]);
        $routes->add('main_home', $route);

        $route = new Route('/new', [
            '_controller' => UserController::class,
            '_method' => 'insert'
        ]);
        $routes->add('main_new', $route);

        $route = new Route('/delete/{id}', [
            '_controller' => HomeController::class,
            '_method' => 'delete'
        ]);
        $routes->add('main_delete', $route);

        $route = new Route('/update/{id}', [
            '_controller' => HomeController::class,
            '_method' => 'update'
        ]);
        $routes->add('main_update', $route);

        $route = new Route('/json', [
            '_controller' => HomeController::class,
            '_method' => 'sendJsonUsers'
        ]);

        $routes->add('main_users_json', $route);

        $route = new Route('/json/{id}', [
            '_controller' => HomeController::class,
            '_method' => 'sendJsonUser'
        ]);

        $routes->add('main_user_json', $route);

        return $routes;
    }
}