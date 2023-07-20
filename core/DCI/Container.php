<?php

namespace Core\DCI;

class Container
{

    /**
     * @var array
     */
    private array $services = [];

    /**
     * @var array
     */
    private array $result = [];


    /**
     * @param array $services
     */
    public function __construct(array $services)
    {
        $this->services = $services;
    }


    /**
     * @param string $keyService
     * @return mixed
     */
    public function get(string $keyService): mixed
    {
        if (array_key_exists($keyService, $this->result)) {
            dd($keyService);
            return $this->result[$keyService];
        }
        $valueOfCallable = $this->services[$keyService];

        if (is_callable($valueOfCallable) === true) {
            $valueOfCallable = $valueOfCallable($this);
        }

        $this->result[$keyService] = $valueOfCallable;
        return $valueOfCallable;
    }


}
