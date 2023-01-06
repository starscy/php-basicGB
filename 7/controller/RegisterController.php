<?php
require_once 'model/UserProvider.php';
require_once 'model/User.php';

session_start();

$pdo = require 'db.php'; // Подключим PDO
$error = null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user']);
    unset($_SESSION['tasks']);
    header("Location: index.php");
    die();
}

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->registerUser($username, $password);

   
    // $user = $userProvider->registerUser($username, $password);


    // $userProvider = new UserProvider($pdo);
    // $user = $userProvider->getByUsernameAndPassword($username, $password);

    // if ($user === null) {
    //     $error = 'Пользователь с указанными учетными данными не найден';
    // } else {
    //     $_SESSION['user'] = $user;
    //     header("Location: index.php");
    //     die();
    // }
}






include "view/register.php";