<?php
include "model/User.php";
include "model/UserProvider.php";
include "model/Task.php";


$pdo = include "db.php";

$pdo->exec('CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(150),
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
)');

$pdo->exec('CREATE TABLE tasks (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(150),
  userId VARCHAR(100) NOT NULL,
)');

$user = new User('admin');
$user2 = new User('vadim');
$user->setName('Ember Song');
$user2->setName('vadim');

$task = new Task ('my first task');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');
$userProvider->registerUser($user2, '000');