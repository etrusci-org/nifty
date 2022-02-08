<?php
/**
 * Convert HTML5 special characters to HTML entities and print the converted HTML.
 *
 * @param string $html  Input HTML.
 * @return void
 *
 * @example hsc5print.example.php
 * @see https://php.net/htmlspecialchars
 * @see https://php.net/print
 */
function hsc5print(string $html): void {
    print(htmlspecialchars($html, ENT_HTML5));
}
