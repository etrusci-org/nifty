<?php
function hsc5($html) {
    return htmlspecialchars($html, ENT_HTML5);
}


/* Example:

$html = "hello <foo> & <bar>";

$html = hsc5($html);

var_dump($html);

*/
