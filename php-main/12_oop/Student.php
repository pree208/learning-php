<?php

require_once "Person.php";

class Student extends Person
{
  public  $StudentId;

  public function __construct($name, $surname, $StudentId)
  {

    parent::__construct($name, $surname);
    $this->age = 18;
    $this->StudentId = $StudentId;
  }
}
