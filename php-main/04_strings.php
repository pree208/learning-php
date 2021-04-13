<?php

// Create simple string
$name = "Preethi";
$string = 'hi my name is $name.';
$string2 = "hi my name is $name.";
echo $string . '<br>';
echo $string2 . '<br>';
// String concatenation
echo 'hello' . 'world' . '<br>';
// String functions

$string = "  Hello World  ";

echo "1-  " . strlen($string) . '<br>';
echo "2-  " . trim($string) . '<br>';
echo "3-  " . ltrim($string) . '<br>';
echo "4-  " . rtrim($string) . '<br>';
echo "5-  " . str_word_count($string) . '<br>';
echo "6-  " . strtoupper($string) . '<br>';
echo "7-  " . strtolower($string) . '<br>';
echo "8-  " . ucfirst('hello') . '<br>';
echo "9-  " . lcfirst('Hello') . '<br>';
echo "10-  " . ucwords('Hello world') . '<br>';
echo "11-  " . strpos($string, 'World') . '<br>';
echo "12-  " . stripos($string, 'world') . '<br>';
echo "13-  " . substr($string, 8, 6) . '<br>'; //3rd argument denotes length
echo "14-  " . str_replace('Hello', 'hii', $string) . '<br>';
echo "15-  " . str_ireplace('hello', 'hii', $string) . '<br>';

// Multiline text and line breaks
$longtext = "
Hello.My name is Zura.
My age is 27.
I love my daughter.";
echo $longtext;
echo nl2br($longtext) . '<br>';
// Multiline text and reserve html tags
$longtext = "
Hello.My name is <b>Zura</b>.
My age is <b> 27</b>.
I love my daughter.";
echo
htmlentities($longtext);
echo nl2br(htmlentities($longtext));
//html_entity_decode();//decodes the html tags
// https://www.php.net/manual/en/ref.strings.php
