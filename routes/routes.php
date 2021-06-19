<?php

use CoffeeCode\Router\Router;

$router = new Router(BASE_URL);

$router->namespace("App\\Controllers");

$router->get("/","HomeController:index");
$router->get("/404","NotFoundController:index");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/404");
}

