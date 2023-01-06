<?php
$pass = "123" . "djhfib23iygf982uj";
$hash = '$2y$10$mq/GOfpYFQSjmY.eCLszmuMEMtawqxMTr3jYfzRWnJmHDZSbl90.C';
var_dump(password_verify($pass, $hash));