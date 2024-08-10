<?php

namespace ConsistentPHP;

class Type extends ConsistentBase {
    public function isArray(mixed $value): bool {
        return is_array($value);
    }

    public function isString(mixed $value): bool {
        return is_string($value);
    }

    public function isInt(mixed $value): bool {
        return is_int($value);
    }

    public function isFloat(mixed $value): bool {
        return is_float($value);
    }

    public function isBool(mixed $value): bool {
        return is_bool($value);
    }

    public function isCallable(mixed $value): bool {
        return is_callable($value);
    }

    public function isObject(mixed $value): bool {
        return is_object($value);
    }

    public function isNull(mixed $value): bool {
        return is_null($value);
    }
}