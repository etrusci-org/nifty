<?php
/**
 * Remove excess whitespace.
 *
 * @param string $str  Input string.
 * @return string  String with normalized whitespace.
 *
 * @example normalizeSpaces.example.php
 * @see https://php.net/trim
 * @see https://php.net/preg_replace
 */
function normalizeSpaces(string $str): string {
    return trim(preg_replace('/\s+/', ' ', $str));
}
