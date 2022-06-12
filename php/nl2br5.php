<?php
declare(strict_types=1);


/**
 * Insert HTML5 line breaks before all newlines.
 *
 * @param string $html  Input HTML.
 * @return string  HTML with line breaks inserted.
 */
function nl2br5(string $html): string {
    return nl2br($html, FALSE);
}
