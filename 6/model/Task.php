<?php

class Task
{
    
    private string $description;
    private bool $isDone;

    public function __construct(string $description)
    {
        $this->description = $description;
        $this->isDone = false;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isDone ():bool
    {
        return $this->isDone;
    }
}