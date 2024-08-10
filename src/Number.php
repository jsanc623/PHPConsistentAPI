<?php

namespace ConsistentPHP;

class Number extends ConsistentBase {
    public function format(float $number, int $decimals = 2, string $decimalPoint = '.', string $thousandsSeparator = ','): string {
        return number_format($number, $decimals, $decimalPoint, $thousandsSeparator);
    }

    public function isInteger(float $value): bool {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public function isFloat(float $value): bool {
        return is_float($value);
    }

    public function random(int $min = 0, int $max = 100): int {
        return rand($min, $max);
    }

    public function randomFloat(float $min = 0.0, float $max = 1.0, int $decimals = 2): float {
        return round($min + mt_rand() / mt_getrandmax() * ($max - $min), $decimals);
    }
}

