<?php

use App\Controller\HomeController;
use Core\Router\Route;

return [
    new Route('/', HomeController::class, 'showHome'),
];
