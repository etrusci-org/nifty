<?php
declare(strict_types=1);


/**
 * Get the current client IP.
 *
 * Looks in $_SERVER REMOTE_ADDR, HTTP_CLIENT_IP, and HTTP_X_FORWARDED_FOR.
 *
 * @return string|bool  Client IP or false if there was none to get.
 */
function getClientIP(): string|bool {
    $ip = false;

    if (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }

    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    // HTTP_X_FORWARDED_FOR usually contains more than one ip: client, proxy1, proxy2, ..., but we only want the client ip.
    if (is_string($ip) && strstr($ip, ',')) {
        $dump = explode(',', $ip);
        if (is_array($dump) && isset($dump[0])) {
            $ip = trim($dump[0]);
        }
    }

    return $ip;
}
