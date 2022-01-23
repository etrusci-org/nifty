<?php
require __DIR__.'/WebRouter.php';

$Router = new WebRouter();

$autoRoute = $Router->parseRoute();

var_dump($autoRoute);

$myRoute = array(
    'r' => 'node/var1:foo/var2:bar/flag1/flag2',
);

$customRoute = $Router->parseRoute($myRoute);

var_dump($customRoute);
