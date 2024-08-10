<?php

namespace ConsistentPHP;

abstract class ConsistentBase implements ConsistentInterface {
    protected mixed $value;

    public function __construct(mixed $value) {
        $this->value = $value;
    }

    public static function set($value): static {
        return new static($value);
    }

    public function get(): mixed {
        return $this->value;
    }

    public function reset(mixed $value): static {
        $this->value = $value;
        return $this;
    }
}