<?php
require_once './classUser.php';
require_once './task1.php';

class Comment {
    private User $author;
    private Task $task;
    private string $text;

    function __construct(User $user, Task $task, string $text) 
    {
       $this-> author = $user ;
       $this-> task = $task ;
       $this-> text = $text;
    }

    function getComment ()
    {
        return $this -> text; 
    }
}

class TaskService {
    static function addComment (User $user,Task $task, string $text )
    {
        $comment = new Comment( $user, $task,  $text );
        $task-> setAddComment($comment -> getComment ());
        return $comment;
    }
}

$user = new User('starscy','st@m.com',32);
$task = new Task($user,'learn php',1);

TaskService::addComment($user, $task, 'first comment');
TaskService::addComment($user, $task, 'second comment');
TaskService::addComment($user, $task, 'third comment');

// print_r($task -> show()) ;
// print_r($task -> showComments()); 