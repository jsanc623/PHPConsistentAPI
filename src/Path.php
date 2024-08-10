<?php

namespace ConsistentPHP;

class Path extends ConsistentBase {
    public function basename(string $path, string $suffix = ''): string {
        return basename($path, $suffix);
    }

    public function dirname(string $path): string {
        return dirname($path);
    }

    public function extension(string $path): string {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    public function isAbsolute(string $path): bool {
        return !empty($path) && (str_starts_with($path, '/') || preg_match('/^[a-zA-Z]:\\\\/', $path));
    }

    public function normalize(string $path): string {
        return preg_replace('/[\\\\\/]+/', DIRECTORY_SEPARATOR, $path);
    }
}