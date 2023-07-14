<?php
require_once 'model/UserProvider.php';

$pdo = require 'db.php'; // Подключим PDO

session_start();

$error = null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    //setcookie('username', null, -1, '/');
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    header("Location: index.php");

    // unset($_COOKIE['username']);
}

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($username, $password);

    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['username'] = $user;
        $_SESSION['user_id'] = $user->getId();
        header("Location: index.php");
        die();
    }
}

include "view/signin.php";