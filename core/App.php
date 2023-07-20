<?php

namespace Core;

use Core\Http\Request;
use Core\Router\Router;
use Exception;

class App
{

    /**
     * @param Request $request
     * @return void
     * @throws Exception
     */
    public static function handle(Request $request) : void
    {
        $routes = require_once '../config/routes.php';
        $route = (new Router($routes))->match($request);

        $controllerName = $route->getControllerName();
        if (!class_exists($controllerName)) {
            throw new \LogicException($controllerName.'  not found');
        }
        $controller = new $controllerName();
        $action = $route->getAction();
        $controller->$action($route->getParams());
    }
}