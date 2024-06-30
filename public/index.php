<?php
require '../helpers.php';
require basePath('Database.php');
require basePath('Router.php');

// Instantiating the Router
$router = new Router();

// Get routes
$routes = require basePath('routes.php');

// Get current URI and HTTP metho
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);
