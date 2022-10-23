<?php

namespace App\Utils;

//routage Route et RouteCollection
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

//controllers
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

        $route = new Route('/create', [
            '_controller' => HomeController::class,
            '_method' => 'create'
        ]);

        $routes->add('main_create', $route);

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

        return $routes;
    }
}