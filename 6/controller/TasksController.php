<?php
require_once 'model/User.php';
require_once 'model/Task.php';
require_once 'model/UserProvider.php';
require_once 'model/TaskProvider.php';

session_start();

$username = null;

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $username = $user->getUsername();
} else {
    header('Location: /');
    die();

}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['username']);
    session_destroy();
    header('Location: /');
}

$taskProvider = new TaskProvider();

$tasks = $taskProvider->getUndoneList();

if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskProvider->addTask(new Task($_POST['taskName']));
    header('Location: /?controller=tasks');
    die();
}

include "view/tasks.php";