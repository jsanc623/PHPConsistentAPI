<?php

namespace ConsistentPHP;

class Session extends ConsistentBase {
    public function start(): self {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return $this;
    }

    public function setKeyVal(string $key, mixed $value): self {
        $_SESSION[$key] = $value;
        return $this;
    }

    public function getValue(string $key, mixed $default = null): mixed {
        return $_SESSION[$key] ?? $default;
    }

    public function remove(string $key): self {
        unset($_SESSION[$key]);
        return $this;
    }

    public function clear(): self {
        session_unset();
        return $this;
    }

    public function destroy(): self {
        session_destroy();
        return $this;
    }
}