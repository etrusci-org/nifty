<?php
require __DIR__.'/jdec.php';

$data = '{"foo": "bar", "prime": 13}';

$data = jdec($data);

var_dump($data);
