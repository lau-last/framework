<?php

namespace Core\Router;

use Core\Http\Request;
use Exception;

class Router
{

    /**
     * @var array
     */
    private array $routes;


    /**
     * @param array $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }


    /**
     * @param Request $request
     * @return Route
     * @throws Exception
     */
    public function match(Request $request): Route
    {
        foreach ($this->routes as $currentRoute) {
            if ($currentRoute->matches($request)) {
                return  $currentRoute;
            }
        }
        throw new Exception('404');
    }


}
