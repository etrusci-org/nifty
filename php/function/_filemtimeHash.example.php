<?php
require __DIR__.'/filemtimeHash.php';

$hash = filemtimeHash(__FILE__);

var_dump($hash);
