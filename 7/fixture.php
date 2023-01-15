<?php
include "model/User.php";
include "model/UserProvider.php";
include "model/Task.php";
include "model/TaskProvider.php";

$pdo = include "db.php";

$pdo->exec('CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(150),
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
  )');
  
  $pdo->exec('CREATE TABLE tasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    description VARCHAR(1500),
    userId INTEGER ,
    isDone TINYINT DEFAULT(0)
  )');

// $user = new User('admin');
// $user->setName('test admin');

$userProvider = new UserProvider($pdo);
// $userProvider->registerUser($user, '123'); 
