<?php
declare(strict_types=1);


/**
 * Remove excess whitespace from a string.
 *
 * @param string $str  Input string.
 * @return string  String with normalized whitespace.
 */
function normalizeWhitespace(string $str): string {
    return trim(preg_replace('/\s+/', ' ', $str));
}
