<?php
function joinPath(...$parts) {
    return implode(DIRECTORY_SEPARATOR, $parts);
}
