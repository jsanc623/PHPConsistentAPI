<?php

namespace ConsistentPHP;

class Hash extends ConsistentBase {
    public function __construct(string $data = '') {
        $this->value = $data;
        parent::__construct($this->value);
    }

    public function setData(string $data): self {
        $this->value = $data;
        return $this;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function md5(): string {
        return md5($this->value);
    }

    public function sha1(): string {
        return sha1($this->value);
    }

    public function sha256(): string {
        return hash('sha256', $this->value);
    }

    public function bcrypt(string $cost = '10'): string {
        return password_hash($this->value, PASSWORD_BCRYPT, ['cost' => $cost]);
    }

    public function verifyBcrypt(string $hash): bool {
        return password_verify($this->value, $hash);
    }

    public function hashHmac(string $key, string $algo = 'sha256'): string {
        return hash_hmac($algo, $this->value, $key);
    }
}