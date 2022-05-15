<?php
require __DIR__.'/jenc.php';

$data1 = jenc(array('foo' => 'bar', 'prime' => 13));
$data2 = jenc('foo bar');
$data3 = jenc(null);

var_dump($data1);
// string(37) "{
//     "foo": "bar",
//     "prime": 13
// }"

var_dump($data2);
// string(9) ""foo bar""

var_dump($data3);
// bool(false)
