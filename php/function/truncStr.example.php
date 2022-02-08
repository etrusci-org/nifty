<?php
require __DIR__.'/truncStr.php';

$str1 = truncStr('foo bar moo cow', 6);
$str2 = truncStr('foo bar moo cow', 14);
$str3 = truncStr('foo bar moo cow', 15);
$str4 = truncStr('foo bar moo cow', 18);

var_dump($str1);
// string(6) "foo..."

var_dump($str2);
// string(14) "foo bar moo..."

var_dump($str3);
// string(15) "foo bar moo cow"

var_dump($str4);
// string(15) "foo bar moo cow"
