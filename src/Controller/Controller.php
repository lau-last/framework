<?php

namespace App\Controller;

use Core\Render\PHPRender;

class Controller
{

    /**
     * @var PHPRender
     */
    private PHPRender $PHPRender;


    /**
     * @param PHPRender $PHPRender
     */
    public function __construct(PHPRender $PHPRender)
    {
        $this->PHPRender = $PHPRender;
    }


}