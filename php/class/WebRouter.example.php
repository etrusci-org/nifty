<?php
require __DIR__.'/WebRouter.php';

$Router = new WebRouter();

$autoRoute = $Router->parseRoute();
$customRoute = array(
    'r' => 'mypage/somevar:helloworld/anothervar:123/moo/cow',
);

$customRoute = $Router->parseRoute($customRoute);
print('<pre>');
var_dump($autoRoute);
// array(5) {
//     ["time"]=>
//     int(1644334782)
//     ["request"]=>
//     string(0) ""
//     ["node"]=>
//     string(5) "index"
//     ["var"]=>
//     array(0) {
//     }
//     ["flag"]=>
//     array(0) {
//     }
//   }

var_dump($customRoute);
// array(5) {
//   ["time"]=>
//   int(1644334782)
//   ["request"]=>
//   string(48) "mypage/somevar:helloworld/anothervar:123/moo/cow"
//   ["node"]=>
//   string(6) "mypage"
//   ["var"]=>
//   array(2) {
//     ["anothervar"]=>
//     string(3) "123"
//     ["somevar"]=>
//     string(10) "helloworld"
//   }
//   ["flag"]=>
//   array(2) {
//     [0]=>
//     string(3) "cow"
//     [1]=>
//     string(3) "moo"
//   }
// }
