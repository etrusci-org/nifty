<?php
require __DIR__.'/WebRouter.php';

$Router = new WebRouter();

$autoRoute = $Router->parseRoute();

var_dump($autoRoute);

$myRoute = array(
    'r' => 'node/somevar:helloworld/anothervar:123/moo/cow',
);

$customRoute = $Router->parseRoute($myRoute);

var_dump($customRoute);
