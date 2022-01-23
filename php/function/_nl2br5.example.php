<?php
require __DIR__.'/nl2br5.php';

$html = 'hello
cruel
world';

$html = nl2br5($html);

var_dump($html);
