<?php

namespace ConsistentPHP;

class Cookie extends ConsistentBase {
    public function setCookieValue(string $name, mixed $value, int $expires = 0, string $path = '/', string $domain = '', bool $secure = false, bool $httponly = false): self {
        $this->value[$name] = $value; // Store value for internal usage
        setcookie($name, $value, $expires, $path, $domain, $secure, $httponly);
        return $this;
    }

    public function getCookieByName(string $name, mixed $default = null): mixed {
        return $_COOKIE[$name] ?? $default;
    }

    public function has(string $name): bool {
        return isset($_COOKIE[$name]);
    }

    public function remove(string $name): self {
        if ($this->has($name)) {
            unset($_COOKIE[$name]);
            setcookie($name, '', time() - 3600); // Expire the cookie
        }
        return $this;
    }

    public function all(): array {
        return $_COOKIE;
    }

    public function clear(): self {
        foreach ($this->all() as $name => $value) {
            $this->remove($name);
        }
        return $this;
    }
}