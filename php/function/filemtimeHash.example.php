<?php
require __DIR__.'/filemtimeHash.php';

$hash1 = filemtimeHash(__FILE__);
$hash2 = filemtimeHash(__FILE__, 'sha256');

var_dump($hash1);
// string(40) "a7410f2a98e4618a3ab19033777fbdb044743b36"

var_dump($hash2);
// string(64) "6121c4aeb0b03d4e6465dbf40543fe83cf02f7f6edf243dd1769eb71dcb5fe8a"
