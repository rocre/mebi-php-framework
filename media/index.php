<?php

/*** include the init-helper file ***/
require_once('init.php');

/*** get url from script ***/
$routerPath = (isset($_GET['r'])) ? $_GET['r'] : 'Default';

/*** extract components from url, load controller and launch method with args ***/
$router = new WebRouter($routerPath);
$controllerName = $router->getControllerName();
$controller = new $controllerName();
$controller->callMethod($router->getMethod(), $router->getArgs());
