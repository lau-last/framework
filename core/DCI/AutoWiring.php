<?php

namespace Core\DCI;

use ReflectionException;

class AutoWiring
{


    /**
     * @param string $id
     * @return string|object|null
     * @throws ReflectionException
     */
    public function get(string $id): string|null|object
    {
        $reflectionClass = new \ReflectionClass($id);
        $parameters = $reflectionClass->getConstructor()?->getParameters();

        if ($parameters === null) {
            return new $id();
        }

        $dependencies = [];

        foreach ($parameters as $parameter) {
            $type = $parameter->getType();
            if ($type->isBuiltin() === false) {
                $instance = $this->get($type);
                $dependencies[] = $instance;
            }
        }
        return $reflectionClass->newInstanceArgs($dependencies);
    }


}
