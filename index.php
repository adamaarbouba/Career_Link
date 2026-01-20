<?php
require_once "vendor/autoload.php";

use App\Router\Router;
use App\Controllers\AuthController;
use App\Middleware\AuthMiddleware;


$request = $_SERVER["REQUEST_URI"];

$script_name = '/Career_Link/';

$url = str_replace($script_name, '', $request);

$url = parse_url($url, PHP_URL_PATH);

$url = trim($url, '/');

$Router = new Router();

$Router->add("register", function () {
    include_once "src/Views/auth/register.php";
    echo "Hello";
    // $auth = new AuthController;
    // $auth->register();
});
$Router->add("login", function () {
    include_once "src/Views/auth/login.php";
});
$Router->add("admin", function () {
    // $midWare = new AuthMiddleware;
    // $midWare->Check();
});
$Router->add("recruiter", function () {
    // $midWare = new AuthMiddleware;
    // $midWare->Check();
});
$Router->add("candidate", function () {
    // $midWare = new AuthMiddleware;
    // $midWare->Check();
});
$Router->add("home", function () {
    include_once "src/Views/home.php";
});

$Router->dispatch($url);
