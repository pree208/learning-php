<?php

// What is class and instance
require_once "Person.php";
require_once "Student.php";

$Student = new Student("PREE", "THA", 1234);


echo '<pre>';
var_dump($Student);
echo '</pre';

///$p = new Person("Brad", "Traversy");
//$p->setAge(25);




//$p2 = new Person("john", "smith");

//$p2->name = 'john';
//$p2->surname = 'smith';

//echo '<pre>';
//var_dump($p);
//echo '</pre';

//echo $p->getAge();


//echo '<pre>';
//var_dump($p2);
//echo '</pre';

////echo Person::$counter; //SINCE one object is creted $p in class person counter is one

//echo Person::getCounter();//same as $counter but called using method



//echo $p->name . '<br>';
// Create Person class in Person.php

// Create instance of Person

// Using setter and getter