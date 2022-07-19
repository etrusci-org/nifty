<?php
declare(strict_types=1);


/**
 * Get current date/time either in a human readable format or as unixtime.
 *
 * @param bool $human=true  Whether to return a human readable format.
 * @param string $humanFmt='Y-m-d H:i:s e'  Human format to apply.
 * @return string|int  Current date/time in either human readable format or as unixtime.
 */
function getCurrentDateTime(bool $human=true, string $humanFmt='Y-m-d H:i:s e'): string|int {
    if (!$human) {
        return time();
    }
    return date($humanFmt);
}
