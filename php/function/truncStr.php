<?php
function truncStr($str, $length, $end='...') {
    $length = $length - strlen($end);
    return (strlen($str) > $length) ? sprintf('%s%s', substr($str, 0, $length), $end) : $str;
}


/* Example:

$str = 'foo bar moo cow';

$str = truncStr($str, 6);

var_dump($str);

*/
