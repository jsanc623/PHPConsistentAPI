<?php

namespace ConsistentPHP;

interface ConsistentInterface {
    public static function set(mixed $value): static;
    public function get(): mixed;
    public function reset(mixed $value): static; // Optional: Reset the value to the initial state
}