<?php
/**
 * Get current date/time.
 *
 * @param bool $human=true  Whether to return a human readable format.
 * @param string $humanFmt='Y-m-d H:i:s e'  Human format to apply.
 * @return string|int  Current date/time in either human readable format or as unixtime.
 *
 * @example dtNow.example.php
 * @see https://php.net/time
 * @see https://php.net/date
 */
function dtNow(bool $human=true, string $humanFmt='Y-m-d H:i:s e'): string|int {
    if (!$human) {
        return time();
    }
    return date($humanFmt);
}
