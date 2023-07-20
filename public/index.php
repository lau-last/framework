<?php

use Config\Routes;
use Core\Http\Request;
use Core\Router\Router;

define('ROOT', \dirname(__DIR__));
const TEMPLATE = 'base';
const VIEW_PATH = ROOT . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;

require '../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$request = new Request();

try {
    \Core\App::handle($request);
} catch (Exception $e) {
    echo 'Pas bon';
}

$container = new \Core\DCI\Container(require ROOT.'/config/services.php');

var_dump($container->get(\Core\Render\PHPRender::class));