<?php
declare(strict_types=1);


/**
 * Remove excess whitespace.
 *
 * @param string $str  Input string.
 * @return string  String with normalized whitespace.
 */
function normalizeSpaces(string $str): string {
    return trim(preg_replace('/\s+/', ' ', $str));
}
