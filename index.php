<?php
require_once "vendor/autoload.php";

use App\Router\Router;
use App\Controllers\AuthController;
use App\Middleware\AuthMiddleware;


$url = $_SERVER["REQUEST_URI"];
$url = str_replace("/","","$url");

$path = parse_url($url, PHP_URL_PATH);

$Router = new Router();

$Router->add("Views/auth/register", function () {
    // $auth = new AuthController;
    // $auth->register();
});

$Router->add("Views/auth/register", function () {
    // $auth = new AuthController;
    // $auth->register();
});
$Router->add("Views/auth/login", function () {
    // $auth = new AuthController;
    // $auth->login();
});
$Router->add("Views/admin/dashboard", function () {
    // $midWare = new AuthMiddleware;
    // $midWare->Check();
});
$Router->add("Views/company/dashboard", function () {
    // $midWare = new AuthMiddleware;
    // $midWare->Check();
});
$Router->add("Views/candidate/dashboard", function () {
    // $midWare = new AuthMiddleware;
    // $midWare->Check();
});

$Router->dispatch($path);
