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
});
$Router->add("login", function () {
    include_once "src/Views/auth/login.php";
});
$Router->add("admin/dashboard", function () {
    include_once "src/Views/admin/dashboard.php";
});
$Router->add("recruiter/dashboard", function () {

    include_once "src/Views/recruiter/dashboard.php";
});
$Router->add("candidate/dashboard", function () {

    include_once "src/Views/candidate/dashboard.php";
});
$Router->add("home", function () {
    include_once "src/Views/home.php";
});
$Router->add("recruiter/offer", function () {
    include_once "src/Views/recruiter/createJobOffer.php";
});
$Router->add("saveJob", function () {});
$Router->add("authLogin", function () {});
$Router->add("authCandidate", function () {});
$Router->add("authRecruiter", function () {});

$Router->dispatch($url);
