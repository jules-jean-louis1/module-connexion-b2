<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\{
    AuthController,
};

/**
 * Router
 */
$router = new AltoRouter();
$router->setBasePath('/');

/**
 * Routes
 */
