<?php
declare(strict_types=1);


/**
 * Add duration strings for total seconds.
 *
 * Valid duration strings:
 * - DD:HH:MM:SS | D:H:M:S
 * - HH:MM:SS | H:M:S
 * - MM:SS | M:S
 *
 * @param array $durations  Durations to be added.
 * @param string $assocKey  Array key of duration value if input array is multidimensional.
 * @return int  Total of added durations in seconds.
 */
function addDurations(array $durations, string $assocKey = ''): int {
    if ($assocKey) {
        $dump = array();
        foreach ($durations as $v) {
            $dump[] = $v[$assocKey];
        }
        $durations = $dump;
    }

    $s = 0;
    foreach ($durations as $v) {
        $v = explode(':', $v);
        // d:h:m:s
        if (count($v) == 4) {
            $s += intval($v[0]) * 86400;
            $s += intval($v[1]) * 3600;
            $s += intval($v[2]) * 60;
            $s += intval($v[3]);
        }
        // h:m:s
        if (count($v) == 3) {
            $s += intval($v[0]) * 3600;
            $s += intval($v[1]) * 60;
            $s += intval($v[2]);
        }
        // m:s
        if (count($v) == 2) {
            $s += intval($v[0]) * 60;
            $s += intval($v[1]);
        }
    }

    return $s;
}
