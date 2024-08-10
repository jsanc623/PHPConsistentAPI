<?php

namespace ConsistentPHP;

class Env extends ConsistentBase {
    public function __construct() {
        $this->value = $_ENV; // Initialize with current environment variables
        parent::__construct($this->value);
    }

    public function getValue(string $key, $default = null) {
        return $this->value[$key] ?? $default;
    }

    public function setKeyVal(string $key, $value): self {
        $this->value[$key] = $value;
        putenv("$key=$value"); // Update the environment variable
        return $this;
    }

    public function has(string $key): bool {
        return array_key_exists($key, $this->value);
    }

    public function delete(string $key): self {
        if ($this->has($key)) {
            unset($this->value[$key]);
            putenv($key); // Remove the environment variable
        }
        return $this;
    }

    public function all(): array {
        return $this->value;
    }

    public function clear(): self {
        foreach ($this->value as $key => $_) {
            $this->delete($key);
        }
        return $this;
    }
}