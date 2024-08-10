<?php

namespace ConsistentPHP;

class Str extends ConsistentBase {
    public function find($search): \ConsistentPHP\Str {
        $this->value = strpos($this->value, $search);
        return $this;
    }

    public function replace($search, $replace): self {
        $this->value = str_replace($search, $replace, $this->value);
        return $this;
    }

    public function reverse(): self {
        $this->value = strrev($this->value);
        return $this;
    }

    public function length(string $string): int {
        return mb_strlen($string);
    }

    public function toUpper(string $string): self {
        $this->value = mb_strtoupper($string);
        return $this;
    }

    public function toLower(string $string): self {
        $this->value = mb_strtolower($string);
        return $this;
    }

    public function trim(string $string): self {
        $this->value = trim($string);
        return $this;
    }

    public function contains(string $haystack, string $needle): bool {
        return mb_strpos($haystack, $needle) !== false;
    }

    public function split(string $string, string $delimiter): self {
        $this->value = explode($delimiter, $string);
        return $this;
    }

    public function substring(string $string, int $start, int $length = null): self {
        $this->value = mb_substr($string, $start, $length);
        return $this;
    }
}