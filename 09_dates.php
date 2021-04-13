<?php

// Print current date
echo date('y-m-d H-i-s') . '<br>';
// Print yesterday
echo date('y-m-d H-i-s', time() - 60 * 60 * 24) . '<br>';
// Different format: https://www.php.net/manual/en/function.date.php
echo date('F j Y, H,i,s') . '<br>';
// Print current timestamp
echo time() . '<br>';
// Parse date: https://www.php.net/manual/en/function.date-parse.php
$parseddate = date_parse('2021-03-01 02.00.00');
echo '<pre>';
var_dump($parseddate);
echo '</pre>';
// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php
$dateString = 'Febrauary 4 2020 12:45:35';
$parseddate = date_parse_from_format('F j Y H:i:s', $dateString);
echo '<pre>';
var_dump($parseddate);
echo '</pre>';
