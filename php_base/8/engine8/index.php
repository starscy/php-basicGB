<?php
//session_start();
//unset($_SESSION['username']);
$controller = $_GET['controller'] ?? 'index';

try {
    $routes = require 'routes.php';

    require_once $routes[$controller];

} catch (Exception $e) {
    echo $e->getMessage();
}
