<?php
function hsc5print($html) {
    print(htmlspecialchars($html, ENT_HTML5));
}


/* Example:

$html = "hello <foo> & <bar>";

hsc5print($html);

*/
