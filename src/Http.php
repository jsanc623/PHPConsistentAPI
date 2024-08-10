<?php

namespace ConsistentPHP;

class Http extends ConsistentBase {
    public function __construct() {
        $this->value = $_REQUEST; // Initialize with current request data
        parent::__construct($this->value);
    }

    public function getValue(string $key, $default = null) {
        return $this->value[$key] ?? $default;
    }

    public function post(string $key, $default = null) {
        return $_POST[$key] ?? $default;
    }

    public function query(string $key, $default = null) {
        return $_GET[$key] ?? $default;
    }

    public function has(string $key): bool {
        return array_key_exists($key, $this->value);
    }

    public function all(): array {
        return $this->value;
    }

    public function method(): string {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    public function isAjax(): bool {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    public function redirect(string $url): self {
        header("Location: $url");
        exit; // Stop script execution
    }

    public function response(array $data, int $statusCode = 200): self {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit; // Stop script execution
    }
}