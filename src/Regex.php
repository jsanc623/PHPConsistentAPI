<?php

namespace ConsistentPHP;

class Regex extends ConsistentBase {
    public function match(string $pattern, string $subject): array|null {
        if (preg_match($pattern, $subject, $matches)) {
            return $matches;
        }
        return null;
    }

    public function replace(string $pattern, string $replacement, string $subject): string {
        return preg_replace($pattern, $replacement, $subject);
    }

    public function split(string $pattern, string $subject): array {
        return preg_split($pattern, $subject);
    }

    public function search(string $pattern, string $subject): bool {
        return preg_match($pattern, $subject) === 1;
    }
}