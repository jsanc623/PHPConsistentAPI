<?php

namespace ConsistentPHP;

use Random\RandomException;

class Secure extends ConsistentBase {
    public function hash(string $data, string $algorithm = 'sha256'): string {
        return hash($algorithm, $data);
    }

    /**
     * @throws RandomException
     */
    public function generateRandomString(int $length = 16): string {
        return bin2hex(random_bytes($length / 2));
    }

    public function verifyHash(string $data, string $hash, string $algorithm = 'sha256'): bool {
        return hash_equals($hash, $this->hash($data, $algorithm));
    }

    public function sanitizeInput(string $input): string {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

    public function encrypt(string $data, string $key): string {
        return openssl_encrypt($data, 'AES-128-ECB', $key);
    }

    public function decrypt(string $data, string $key): string {
        return openssl_decrypt($data, 'AES-128-ECB', $key);
    }
}