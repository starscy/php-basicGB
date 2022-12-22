<?php
class User {

    private string $username;
    private string $email;
    private ?string $sex;
    private ?int $age;
    private bool $isActive = true;
    private DateTime $dateCreated;

    function __construct (string $username, string $email, ?int $age = null)
    {
       $this->username = $username;
       $this->email = $email;
       $this->dateCreated = new DateTime(); 
       $this->age=$age;
    }

    function getName ()
    {
      return  $this->username ?? 'unknown';
    }
}

// $user=new User('vasd','com',22);
// echo $user->getName();