<?php
require __DIR__.'/../WebApp.php';
require __DIR__.'/../WebRouter.php';
require __DIR__.'/../DatabaseSQLite3.php';


class MyApp extends WebApp {}


$conf = array(
    'dbFile' => ':memory:',
    'pageDir' => __DIR__.'/page',
    'cacheDir' => __DIR__.'/cache',
    'cachingEnabled' => false,
    'cacheTTL' => 86400 * 365 * 1000,
    'cacheExcludedNodes' => array('data'),
    'rewriteURL' => false,
);

$App = new MyApp($conf);

$App->renderOutput();
