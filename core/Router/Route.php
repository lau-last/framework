<?php

namespace Core\Router;

use Core\Http\Request;

class Route
{

    /**
     * @var string
     */
    private string $path;

    /**
     * @var string
     */
    private string $controllerName;

    /**
     * @var string
     */
    private string $action;

    /**
     * @var array
     */
    private array $params = [];

    /**
     * @var array
     */
    private array $method;


    /**
     * @param string $path
     * @param string $controllerName
     * @param string $action
     * @param array $method
     */
    public function __construct(string $path, string $controllerName, string $action, array $method = [])
    {
        $this->path = $path;
        $this->controllerName = $controllerName;
        $this->action = $action;
        $this->method = $method;
    }


    /**
     * @param Request $request
     * @return bool
     */
    public function matches(Request $request): bool
    {
        $matches = [];
        if (\preg_match('/^\\' . $this->path . '$/', $request->getUri(), $matches)) {
            if (\count($matches) > 1) {
                \array_shift($matches);
                $this->params = $matches;
            }

            return true;
        }

        return false;
    }


    /**
     * @return array
     */
    public function getMethod(): array
    {
        return $this->method;
    }


    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }


    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }


    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }


    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }


}
