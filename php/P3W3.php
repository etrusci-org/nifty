<?php
declare(strict_types=1);


/**
 * password_* for the lazy.
 */
class P3W3 {
    static public function getAlgos() {
        return password_algos();
    }


    static public function getHash(string $password, string $algo=PASSWORD_DEFAULT, array $options=array()): string {
        return password_hash($password, $algo, $options);
    }


    static public function getInfo(string $hash): array {
        return password_get_info($hash);
    }


    static public function verify(string $password, string $hash): bool {
        return password_verify($password, $hash);
    }


    static public function needsRehash(string $hash, string $algo=PASSWORD_DEFAULT, array $options=array()): bool {
        return password_needs_rehash($hash, $algo, $options);
    }
}
