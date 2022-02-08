<?php
require __DIR__.'/dtNow.php';

$nowHuman = dtNow();
$nowRobot = dtNow(false);
$nowCustomFmt = dtNow(true, 'm/d/Y H:i');

var_dump($nowHuman);
// string(33) "2022-02-07 12:35:01 Europe/Berlin"

var_dump($nowRobot);
// int(1644233701)

var_dump($nowCustomFmt);
// string(16) "02/07/2022 12:35"
