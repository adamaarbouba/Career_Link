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
$auth = new AuthController();

$Router->add("register", function () {
    include_once "src/Views/auth/register.php";
});
$Router->add("login", function () {
    include_once "src/Views/auth/login.php";
});
<<<<<<< HEAD
$Router->add("login/post",function()use ($auth){
   $auth->login();
=======
$Router->add("admin", function () {
    include_once "src/Views/admin/dashboard.php";
>>>>>>> 4642b01f2d35849fabbf6a55e7790dbd736de8db
});
$Router->add("register/post", function() use ($auth){
  $auth->register(); 
} );

<<<<<<< HEAD
$Router->add("admin/dashboard", function() {
    include "src/Views/admin/dashboard.php";
});
$Router->add("recruiter/dashboard", function() {
    include "src/Views/recruiter/dashboard.php";
});
$Router->add("candidate/dashboard", function() {
    include "src/Views/candidate/dashboard.php";
=======
    include_once "src/Views/recruiter/dashboard.php";
>>>>>>> 4642b01f2d35849fabbf6a55e7790dbd736de8db
});

<<<<<<< HEAD
=======
    include_once "src/Views/candidate/dashboard.php";
});
>>>>>>> 4642b01f2d35849fabbf6a55e7790dbd736de8db
$Router->add("home", function () {
    include_once "src/Views/home.php";
});
$Router->add("authLogin", function () {
    
});
$Router->add("authCandidate", function () {
    
});
$Router->add("authRecruiter", function () {
    
});
<<<<<<< HEAD

=======
>>>>>>> 4642b01f2d35849fabbf6a55e7790dbd736de8db

$Router->dispatch($url);
