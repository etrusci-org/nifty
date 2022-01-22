<?php
function jdec($data) {
    return json_decode($data, TRUE);
}


/* Example:

$data = '{"foo": "bar", "prime": 13}';

$data = jdec($data);

var_dump($data);

*/
