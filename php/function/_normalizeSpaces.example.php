<?php
require __DIR__.'/normalizeSpaces.php';

$str = '     foo   bar     moo cow     ';

$str = normalizeSpaces($str);

var_dump($str);
