<?php
function hsc5print($html) {
    print(htmlspecialchars($html, ENT_HTML5));
}
