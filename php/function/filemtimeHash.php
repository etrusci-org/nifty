<?php
function filemtimeHash($file, $algo='ripemd160') {
    return hash($algo, filemtime($file));
}


/* Example:

$hash = filemtimeHash(__FILE__);

var_dump($hash);

*/
