<?php
require __DIR__.'/dtNow.php';

$nowHuman = dtNow(); // Get the current date/time in a human readable format.
$nowRobot = dtNow(false); // Get the current date/time as unixtime stamp.
$nowCustomFmt = dtNow(true, 'm/d/Y H:i'); // Get the current date/time in a custom format.

var_dump($nowHuman);
var_dump($nowRobot);
var_dump($nowCustomFmt);
