<?php

namespace ConsistentPHP;

class Str {
    protected $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public static function set($value) {
        return new self($value);
    }

    public function get() {
        return $this->value;
    }

    public function find($search) {
        // Logic to store search term, could be used later
        $this->value = strpos($this->value, $search);
        return $this;
    }

    public function replace($search, $replace) {
        $this->value = str_replace($search, $replace, $this->value);
        return $this;
    }

    public function reverse() {
        $this->value = strrev($this->value);
        return $this;
    }
}