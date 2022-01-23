<?php
function normalizeSpaces($str) {
    return trim(preg_replace('/\s+/', ' ', $str));
}
