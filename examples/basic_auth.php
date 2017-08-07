<?php
define('ADMIN_LOGIN', 'admin');
define('ADMIN_PASSWORD', 'pass');

$isEmpty = empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW']);

if (!$isEmpty) {
    $login = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];
    $incorrectAuth = ADMIN_LOGIN != $login || $password != ADMIN_PASSWORD;
}

if ($isEmpty || $incorrectAuth) {
    header('WWW-Authenticate: Basic realm="myRealm"');
    die;
}

echo 'Добро пожаловать, ' . $login;