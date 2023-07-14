<?php

class MyException extends Exception {

}
class My2Exception extends Exception {

}

try {
    try {
        throw new My2Exception();
    } catch (MyException $e) {
        echo "My Error";
    }
    $pdo = new PDO("asasd");
   // throw new Exception("Какая то ошибка");
} catch (PDOException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo  "Обработка какой то ошибки";
}
echo 123;
