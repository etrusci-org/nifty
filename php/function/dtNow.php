<?php
function dtNow($human=true, $humanFmt='Y-m-d H:i:s e') {
    if (!$human) {
        return time();
    }
    return date($humanFmt);
}
