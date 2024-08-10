<?php

namespace ConsistentPHP;

class Math extends ConsistentBase {
    public function max(array $numbers): float|int {
        return max($numbers);
    }

    public function min(array $numbers): float|int {
        return min($numbers);
    }

    public function avg(array $numbers): float {
        return array_sum($numbers) / count($numbers);
    }

    public function round(float $value, int $precision = 0): float {
        return round($value, $precision);
    }

    public function sqrt(float $value): float {
        return sqrt($value);
    }

    public function pow(float $base, float $exponent): float {
        return pow($base, $exponent);
    }
}