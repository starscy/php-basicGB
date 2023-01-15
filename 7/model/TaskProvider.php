<?php
require_once 'Task.php';
require_once 'User.php';

class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function completeTask(string $id):bool
    { 
        $statement = $this->pdo->prepare(
            'UPDATE tasks SET isDone = 1 WHERE id = :id AND userId = :userId'
        );

        return $statement-> execute([
            'userId'=>$_SESSION['userId'],
            'id'=>$id,  
        ]);
    }

    public function getUndoneList() : array
    {
        $statement = $this->pdo->prepare(
           'SELECT * FROM tasks WHERE userId = :userId AND isDone = :isDone '
        );
        $statement->execute([
            'userId'=>$_SESSION['userId'],
            'isDone' => 0
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Task");
        // return $statement->fetchAll(PDO::FETCH_OBJ);
        // return $statement->fetchAll(PDO::FETCH_CLASS );
        // $result = [];
        // while ($statement && $task = $statement->fetch()) {
        //     $result[] = $task;
        // }
        // return $result;
    }

    public function getDoneList() : array
    {
        $statement = $this->pdo->prepare(
           'SELECT * FROM tasks WHERE userId = :userId AND isDone = :isDone '
        );
        $statement->execute([
            'userId'=>$_SESSION['userId'],
            'isDone' => 1
        ]);
        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Task");
    }


    public function addTask(Task $task):bool
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (userId,description) VALUES (:userId, :description)'
        );
        return $statement->execute([
            'userId'=>$_SESSION['userId'],
            'description'=>$task->getDescription(),
        ]);
    }

    ///////////////////////////////////////////////////////////////Дополнительно

    public function deleteTask(int $id): void
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id'
        );
        $statement->execute([
            'id'=>$id,  
        ]);
        // unset($_SESSION['tasks'][$key]);
        // unset($this->tasks[$key]);
    }


}