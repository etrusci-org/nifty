<?php
require __DIR__.'/hsc5.php';

$html = "hello <foo> & <bar>";

$html = hsc5($html);

var_dump($html);
