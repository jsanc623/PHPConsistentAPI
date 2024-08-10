<?php

namespace ConsistentPHP;

class Config extends ConsistentBase {
    public function getValue(string $key, mixed $default = null): mixed {
        return $this->value[$key] ?? $default;
    }

    public function setKeyVal(string $key, mixed $value): self {
        $this->value[$key] = $value;
        return $this;
    }

    public function has(string $key): bool {
        return array_key_exists($key, $this->value);
    }

    public function remove(string $key): self {
        unset($this->value[$key]);
        return $this;
    }

    public function all(): array {
        return $this->value;
    }

    public function merge(array $config): self {
        $this->value = array_merge($this->value, $config);
        return $this;
    }

    public function validate(array $rules): array {
        $errors = [];
        foreach ($rules as $key => $rule) {
            if (!$this->validateRule($key, $rule)) {
                $errors[$key] = "Invalid value for '$key'";
            }
        }
        return $errors;
    }

    protected function validateRule(string $key, string $rule): bool {
        if (!$this->has($key)) {
            return false;
        }

        $value = $this->get($key);

        return match ($rule) {
            'required' => !empty($value),
            'string' => is_string($value),
            'int' => is_int($value),
            'bool' => is_bool($value),
            default => true,
        };
    }
}