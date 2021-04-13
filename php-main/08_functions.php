<?php

// Function which prints "Hello I am Zura"
//function hello()
//{
//  echo 'Hello I am Preethi';
//}
//hello();
//hello();
// Function with argument
//function hello($name)
//{
// return "hello i am $name" . '<br>';
//}
//echo hello('preethi');
//echo hello('Santhosh');
// Create sum of two functions
function sum($a, $b)
{
  return $a + $b;
}

echo sum(10, 20);
// Create function to sum all numbers using ...$nums
//function sums(...$nums)
//{
//$sums = 0;
//foreach ($nums as $n) {
//   $sums += $n;
// }
//return $sums;
//}
//echo sums(1, 2, 3, 4, 5);
// Arrow functions
function sums(...$nums)
{
  return array_reduce($nums, fn ($carry, $n) => $carry + $n);
}
echo sums(1, 2, 3, 4);
