<?php
require 'vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/moduleconnexionb2');

// map homepage
$router->map( 'GET', '/', function() {
    require 'App/Views/home.php';
});

// map user details page
$router->map( 'GET', '/contact/', function() {
    require 'App/Views/contact.php';
});

/* Form Auth */
$router->map('GET', '/login', function () {
    require 'App/Views/import/form/loginForm.php';
});
$router->map('GET', '/register', function () {
    require 'App/Views/import/form/registerForm.php';
});
// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}