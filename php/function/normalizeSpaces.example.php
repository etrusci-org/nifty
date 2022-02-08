<?php
require __DIR__.'/normalizeSpaces.php';

$str = normalizeSpaces('     foo   bar     moo cow     ');

var_dump($str);
// string(15) "foo bar moo cow"
