<?php
require __DIR__.'/hsc5.php';

$html = hsc5('hello <foo> & <bar>');

var_dump($html);
// string(35) "hello &lt;foo&gt; &amp; &lt;bar&gt;"
