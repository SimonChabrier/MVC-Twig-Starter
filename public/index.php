<?php

//Routes declaration
use App\Utils\Routes;

//Routing context et matcher
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Generator\UrlGenerator;
use App\Controllers\ErrorController;

define ('ROOT', dirname(__DIR__));

require_once ROOT. '/vendor/autoload.php';

$current_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//* Processus de routage
try {

    $routes = Routes::allRoutes();
    $context = new RequestContext();
    $matcher = new UrlMatcher($routes, $context);
    
    $parameters = $matcher->match($current_url);

    $controller = $parameters['_controller'];
    $method = $parameters['_method'];
    
    $generator = new UrlGenerator($routes, $context);
   
    $controllerInstance = new $controller($generator);
    //$parameter for id in url
    $controllerInstance->$method($parameters);
  
    } catch (Exception $exception) {
        
        if(str_contains($exception->getMessage(), 'No routes found for')) {
            $controller = new ErrorController();
            $controller->error404();
        }

    }