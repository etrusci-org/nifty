<?php
require __DIR__.'/jenc.php';

$data = array('foo' => 'bar', 'prime' => 13);

$data = jenc($data);

var_dump($data);
