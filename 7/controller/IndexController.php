<?php
require_once 'model/User.php';
session_start();

//Получаем текущего пользователя, если он залогинен
$username = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
}

$pageHeader = "Добро пожаловать в Todo ,".$username ;

include "view/index.php";