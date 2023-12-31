<?php
session_start();
require 'vendor/autoload.php';

use App\Controller\{
    AuthController,
    UserController,
    AdminController
};  

$authController = new AuthController();
$userController = new UserController();
$adminController = new AdminController();

$router = new AltoRouter();
$router->setBasePath('/moduleconnexionb2');

// map homepage
$router->map( 'GET', '/', function() {
    require_once 'src/View/home.php';
});

// map user details page
$router->map( 'GET', '/profil/[i:id]', function( $id ) {
    require_once 'src/View/profil.php';
});
$router->map('GET', '/profil/[i:id]/info', function ($id) use ($userController) {
    $userController->getUserInfo($id);
});
$router->map('POST', '/profil/[i:id]/edit', function ($id) use ($userController) {
    $userController->editUserInfo($id);
});

// map admin page
$router->map( 'GET', '/admin', function() {
    require_once 'src/View/admin.php';
});
$router->map('GET', '/admin/users/[*:search]?/[a:username]/[a:firstname]/[a:lastname]/[a:role]/[a:createdAt]/[a:updatedAt]', function ($search,$username, $firstname, $lastname, $role, $createdAt, $updatedAt) use ($adminController) {
    $adminController->getAllUsers($search, $username, $firstname, $lastname, $role, $createdAt, $updatedAt);
});
// map delete user
$router->map('GET', '/admin/users/[i:id]/delete', function ($id) use ($adminController) {
    $adminController->deleteUser($id);
});
// map edit role user
$router->map('POST', '/admin/users/role/[i:id]', function ($id) use ($adminController) {
    $adminController->editUserRole($id);
});

//map docs page
$router->map( 'GET', '/docs', function() {
    require_once 'src/View/docs.php';
});
/* Form Auth */
$router->map('GET', '/login', function () {
    require_once 'src/View/import/form/loginForm.php';
});
$router->map('GET', '/register', function () {
    require_once 'src/View/import/form/registerForm.php';
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
    require_once 'src/View/404.php';
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}