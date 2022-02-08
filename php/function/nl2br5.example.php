<?php
require __DIR__.'/nl2br5.php';

$html = nl2br5('hello
cruel
world');

var_dump($html);
// string(27) "hello<br>
// cruel<br>
// world"
