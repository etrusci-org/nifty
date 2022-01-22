<?php
function getClientIP() {
    $ip = false;
    if (isset($_SERVER['REMOTE_ADDR']))          $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_CLIENT_IP']))       $ip = $_SERVER['HTTP_CLIENT_IP'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    // HTTP_X_FORWARDED_FOR usually contains more than one ip: client, proxy1, proxy2, ..., but we only want the client ip.
    if (strstr($ip, ',')) {
        $dump = explode(',', $ip);
        if (is_array($dump) && isset($dump[0])) {
            $ip = trim($dump[0]);
        }
    }
    return $ip;
}


/* Example:

$ip = getClientIP();

var_dump($ip);

*/
