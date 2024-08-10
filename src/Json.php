<?php

namespace ConsistentPHP;

class Json extends ConsistentBase {
    public function encode($data): string {
        $this->value = json_encode($data);
        return $this->value;
    }

    public function decode(string $json, bool $assoc = false) {
        $this->value = json_decode($json, $assoc);
        return $this->value;
    }

    public function prettyPrint($data): string {
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    public function validate(string $json): bool {
        return json_validate($json);
    }

    public function getLastError(): string {
        return json_last_error_msg();
    }
}