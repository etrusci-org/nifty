<?php
require __DIR__.'/truncStr.php';

$str = 'foo bar moo cow';

$str = truncStr($str, 6);

var_dump($str);
