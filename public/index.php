<?php
session_start();
define('BASE_URL', '/');
require '../vendor/autoload.php';
require '../src/bootstrap.php';

$myApp = new MVC\Core\App();