<?php
declare(strict_types=1);


/**
 * Convert HTML5 special characters to HTML entities and print the converted HTML.
 *
 * @param string $html  Input HTML.
 * @return void
 */
function hsc5print(string $html): void {
    print(htmlspecialchars($html, ENT_HTML5));
}
