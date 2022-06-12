<?php
declare(strict_types=1);


/**
 * Join parts of a path to a new path using the operating system directory separator.
 *
 * @param string ...$parts  The path parts to be joined.
 * @return string  Joined path parts.
 */
function joinPath(string ...$parts): string {
    return implode(DIRECTORY_SEPARATOR, $parts);
}
