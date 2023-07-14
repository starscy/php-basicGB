<?php
require_once 'model/UserProvider.php';
require_once 'model/User.php';

session_start();

$pdo = require 'db.php'; // Подключим PDO
$error = null;

if (isset($_POST['username'] , $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $regUser = new User($username);
    $regUser->setName($username);
    $user = $userProvider->registerUser($regUser, $password);
    $user = $userProvider->getByUsernameAndPassword($username, $password);

    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['user'] = $user;
        $_SESSION['userId'] = $user->getId();
        header("Location: index.php");
        die();
    }
}

include "view/register.php";