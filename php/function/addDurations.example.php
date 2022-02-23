<?php
require __DIR__.'/addDurations.php';

$durations1 = array(
    '1:0:0:0',
    '0:1:0:0',
    '0:0:1:0',
    '0:0:0:1',
);

$durations2 = array(
    '1:00:00:00',
    '0:01:00:00',
    '0:00:01:00',
    '0:00:00:01',
);

$durations3 = array(
    array('dur' => '1:00:00:00'),
    array('dur' => '0:01:00:00'),
    array('dur' => '0:00:01:00'),
    array('dur' => '0:00:00:01'),
);

$durations4 = array(
    '01:00:00',
    '00:01:00',
    '00:00:01',
);

$durations5 = array(
    '01:00',
    '00:01',
);

var_dump(addDurations($durations1));
// int(90061)

var_dump(addDurations($durations2));
// int(90061)

var_dump(addDurations($durations3, 'dur'));
// int(90061)

var_dump(addDurations($durations4));
// int(3661)

var_dump(addDurations($durations5));
// int(61)
