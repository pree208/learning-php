<?php

// while condition check panitu print panum 
//while(true){

//}
// Loop with $counter
$counter = 0;
while ($counter < 10) {
  echo $counter . '<br>';
  // if ($counter === 5) {
  //   break;
  //}
  $counter++;
}
// do - while print panitu condition check panum so counter less than 0 pota 0 mtum print aagum whileah onume aagadhu
do {
  echo $counter . '<br>';
  $counter++;
} while ($counter < 0);
// for
for ($i = 0; $i <= 10; $i++) {
  echo $i . '<br>';
}

// foreach
$fruits = ['apple', 'orange', 'mango'];
foreach ($fruits as $fruit) {
  echo $fruit . '<br>';
}

foreach ($fruits as $i => $fruit) {
  echo $i . ' ' . $fruit . '<br>';
}
// Iterate Over associative array.
$person = [
  'name' => 'Preethi',
  'surname' => 'Ashok',
  'age' => 19,
  'hobbies' => ['singing', 'dancing']
];
foreach ($person as $key => $value) {
  if (is_array($value)) {
    echo $key . '' . implode(',', $value) . '<br>';
  } else {
    echo $key . '' . $value . '<br>';
  }
}
