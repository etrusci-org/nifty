<?php
function jenc($data, $flags=JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT) {
    return json_encode($data, $flags);
}
