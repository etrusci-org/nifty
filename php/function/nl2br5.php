<?php
/**
 * Insert HTML5 line breaks before all newlines.
 *
 * @param string $html  Input HTML.
 * @return string  HTML with line breaks inserted.
 *
 * @example nl2br5.example.php
 * @see https://php.net/nl2br
 */
function nl2br5(string $html): string {
    return nl2br($html, FALSE);
}
