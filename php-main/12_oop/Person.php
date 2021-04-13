<?php

class Person
{
  public $name;
  public  $surname;
  protected  $age; //?represents its n integer but it also accepts null value  
  public static  $counter = 0;

  public function __construct($name, $surname)
  {
    //echo $name . '' . $surname;
    $this->name = $name;
    $this->surname = $surname;
    //$this->age = null;
    self::$counter++; //accessing static variable
  }

  public function setAge($age) //since age is private property we used public method is ccess it.
  {
    $this->age = $age;
  }

  public static function getCounter()
  {
    return self::$counter;
  }

  public function getAge()
  {
    return $this->age;
  }
}
