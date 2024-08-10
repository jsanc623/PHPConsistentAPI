<?php

namespace ConsistentPHP;

class ArrayUtils extends ConsistentBase {

    public function changeKeyCase(int $case = CASE_LOWER): self {
        $this->value = array_change_key_case($this->value, $case);
        return $this;
    }

    public function chunk(int $size, bool $preserveKeys = false): self {
        $this->value = array_chunk($this->value, $size, $preserveKeys);
        return $this;
    }

    public function column($columnKey, $indexKey = null): self {
        $this->value = array_column($this->value, $columnKey, $indexKey);
        return $this;
    }

    public function countValues(): self {
        $this->value = array_count_values($this->value);
        return $this;
    }

    public function fillKeys(array $keys, $value): self {
        $this->value = array_fill_keys($keys, $value);
        return $this;
    }

    public function filter(callable $callback, int $mode = 0): self {
        $this->value = array_filter($this->value, $callback, $mode);
        return $this;
    }

    public function map(callable $callback): self {
        $this->value = array_map($callback, $this->value);
        return $this;
    }

    public function merge(array ...$arrays): self {
        $this->value = array_merge($this->value, ...$arrays);
        return $this;
    }

    public function unique(): self {
        $this->value = array_unique($this->value);
        return $this;
    }

    public function values(): self {
        $this->value = array_values($this->value);
        return $this;
    }

    public function isAssociative(): bool {
        return array_keys($this->value) !== range(0, count($this->value) - 1);
    }

    public function flatten(): self {
        $result = [];
        array_walk_recursive($this->value, function($value) use (&$result) {
            $result[] = $value;
        });
        $this->value = $result;
        return $this;
    }

    public function uniqueValues(int $flags = SORT_STRING): self {
        $this->value = array_values(array_unique($this->value, $flags));
        return $this;
    }

    public function getRandomElement(): mixed {
        if (empty($this->value)) {
            return null;
        }
        return $this->value[array_rand($this->value)];
    }

    public function pluck(string $key): self {
        $this->value = array_map(fn($item) => $item[$key] ?? null, $this->value);
        return $this;
    }

    public function sortByKey(string $key): self {
        usort($this->value, fn($a, $b) => $a[$key] <=> $b[$key]);
        return $this;
    }

    public function mergeDeep(array $arrayToCompare): self {
        foreach ($arrayToCompare as $key => $value) {
            if (is_array($value) && isset($this->value[$key]) && is_array($this->value[$key])) {
                $this->value[$key] = (new self($this->value[$key]))->mergeDeep($value)->get();
            } else {
                $this->value[$key] = $value;
            }
        }
        return $this;
    }

    public function pop(): mixed {
        return array_pop($this->value);
    }

    public function push(...$values): self {
        array_push($this->value, ...$values);
        return $this;
    }

    public function intersect(array ...$arrays): self {
        $this->value = array_intersect($this->value, ...$arrays);
        return $this;
    }

    public function reverse(): self {
        $this->value = array_reverse($this->value);
        return $this;
    }

    public function diff(array ...$arrays): self {
        $this->value = array_diff($this->value, ...$arrays);
        return $this;
    }

    public function count(): int {
        return count($this->value);
    }

    public function reduce(callable $callback, $initial = null): mixed {
        return array_reduce($this->value, $callback, $initial);
    }

    public function search($needle): int|false {
        return array_search($needle, $this->value);
    }
}