<?php
declare(strict_types=1);


/**
 * Truncate a string to a specific length.
 *
 * @param string $str  Input string.
 * @param int $length  Maximum length of the truncated string.
 * @param string $end  String to add if truncation took place.
 * @return string  Original or truncated string.
 */
function truncateString(string $str, int $length, string $end='...'): string {
    $length = $length - strlen($end);
    return (strlen($str) > $length + strlen($end)) ? sprintf('%s%s', substr($str, 0, $length), $end) : $str;
}
