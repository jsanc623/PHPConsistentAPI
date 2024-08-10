<?php

namespace ConsistentPHP;

class Url {
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

    public function decode() {
        return urldecode($this->value);
    }

    public function encode() {
        return urlencode($this->value);
    }
}