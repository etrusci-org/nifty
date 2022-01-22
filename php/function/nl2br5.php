<?php
function nl2br5($html) {
    return nl2br($html, FALSE);
}


/* Example:

$html = 'hello
cruel
world';

$html = nl2br5($html);

var_dump($html);

*/
