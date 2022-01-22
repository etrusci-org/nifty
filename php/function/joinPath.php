<?php
function joinPath(...$parts) {
    return implode(DIRECTORY_SEPARATOR, $parts);
}


/* Example:

$path = joinPath('each', 'part', 'as', 'arg');

var_dump($path);

*/
