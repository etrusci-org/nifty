<?php
function jenc($data, $flags=JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT) {
    return json_encode($data, $flags);
}


/* Example:

$data = array('foo' => 'bar', 'prime' => 13);

$data = jenc($data);

var_dump($data);

*/
