<?php
require __DIR__.'/jdec.php';

$data1 = jdec('{"foo": "bar", "prime": 13}');
$data2 = jdec('invalid json data');
$data3 = jdec(null);

var_dump($data1);
// array(2) {
//     ["foo"]=>
//     string(3) "bar"
//     ["prime"]=>
//     int(13)
//   }

var_dump($data2);
// NULL

var_dump($data3);
// NULL
