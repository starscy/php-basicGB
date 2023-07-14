<?php


class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function doDoneTask(int $id): bool
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks SET isDone = 1 WHERE id = :id AND user_id = :user_id'
        );

       return $statement->execute([
            'user_id' => $_SESSION['user_id'],
            'id' => $id,
        ]);
     }

    public function getUndoneList(): array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE isDone = 0 AND user_id = :id'
        );

        $statement->execute([
            'id' => $_SESSION['user_id'],
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }


    public function addTask(Task $task): bool
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (user_id, description, isDone) VALUES (:user_id, :description, :isDone)'
        );

        return $statement->execute([
            'user_id' => $_SESSION['user_id'],
            'description' => $task->getDescription(),
            'isDone' => 0
        ]);
    }


}