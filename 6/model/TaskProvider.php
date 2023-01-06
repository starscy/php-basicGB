<?php

require_once 'model/UserProvider.php';

class TaskProvider
{
    // private User $owner;
    private array $tasks;

    function __construct ()
    {
        $this -> tasks= $_SESSION['tasks'] ?? [];
    }

    public function addTask(Task $task): void
    {
        $_SESSION['tasks'][]=$task;
        $this->tasks[]=$task;
    }

    public function getUndoneList () : array
    {
        $tasks=[];
        foreach($this->tasks as $task){
            if(!$task->isDone()){
                $tasks[]=$task;
            }
        }
        return $tasks;
    }

}