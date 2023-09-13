<?php
session_start();
require 'vendor/autoload.php';

use App\Controller\{
    AuthController,
    UserController
};  

$authController = new AuthController();
$userController = new UserController();

$router = new AltoRouter();
$router->setBasePath('/moduleconnexionb2');

// map homepage
$router->map( 'GET', '/', function() {
    require 'src/View/home.php';
});

// map user details page
$router->map( 'GET', '/profil/[i:id]', function( $id ) {
    require 'src/View/profil.php';
});
$router->map('GET', '/profil/[i:id]/info', function ($id) use ($userController) {
    $userController->getUserInfo($id);
});
$router->map('POST', '/profil/[i:id]/edit', function ($id) use ($userController) {
    $userController->editUserInfo($id);
});
$router->map( 'GET', '/contact', function() {
    require 'src/View/contact.php';
});

// map admin page
$router->map( 'GET', '/admin', function() {
    require 'src/View/admin.php';
});

/* Form Auth */
$router->map('GET', '/login', function () {
    require 'src/View/import/form/loginForm.php';
});
$router->map('GET', '/register', function () {
    require 'src/View/import/form/registerForm.php';
});
$router->map('POST', '/register/submit', function () use ($authController) {
    $authController->register();
}, 'register_submit');
$router->map('POST', '/login/submit', function () use ($authController) {
    $authController->login();
}, 'login_submit');

/* Deconnexion */
$router->map('GET', '/logout', function () use ($authController) {
    $authController->logout();
}, 'logout');
// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}