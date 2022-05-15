<?php
declare(strict_types=1);


/**
 * Get hash value of file modification time.
 *
 * @param string $file  Path to file.
 * @param string $algo='ripemd160'  Algorithm to use for hashing.
 * @return string  Hash value of the file's modification time.
 *
 * @example filemtimeHash.example.php
 * @see https://php.net/hash
 * @see https://php.net/hash_algos
 * @see https://php.net/filemtime
 */
function filemtimeHash(string $file, string $algo='ripemd160'): string {
    return hash($algo, strval(filemtime($file)));
}
