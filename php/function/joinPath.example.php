<?php
require __DIR__.'/joinPath.php';

$path = joinPath('each', 'part', 'as', 'arg');

var_dump($path);
// string(16) "each\part\as\arg"
