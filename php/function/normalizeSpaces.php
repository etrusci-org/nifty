<?php
function normalizeSpaces($str) {
    return trim(preg_replace('/\s+/', ' ', $str));
}


/* Example:

$str = '     foo   bar     moo cow     ';

$str = normalizeSpaces($str);

var_dump($str);

*/
