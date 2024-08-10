<?php

namespace ConsistentPHP;

class Url extends ConsistentBase {
    public function decode(): self {
        $this->value = urldecode($this->value);
        return $this;
    }

    public function encode(): self {
        $this->value = urlencode($this->value);
        return $this;
    }

    public function parse(string $url): array
    {
        return parse_url($url);
    }

    public function build(array $parts): string
    {
        return (isset($parts['scheme']) ? "{$parts['scheme']}:" : '') .
            (isset($parts['user']) ? "{$parts['user']}" . (isset($parts['pass']) ? ":{$parts['pass']}" : '') . "@" : '') .
            (isset($parts['host']) ? "{$parts['host']}" : '') .
            (isset($parts['port']) ? ":{$parts['port']}" : '') .
            (isset($parts['path']) ? "{$parts['path']}" : '') .
            (isset($parts['query']) ? "?{$parts['query']}" : '') .
            (isset($parts['fragment']) ? "#{$parts['fragment']}" : '');
    }

    public function encodeRaw(string $url): string
    {
        return rawurlencode($url);
    }

    public function decodeRaw(string $url): string
    {
        return rawurldecode($url);
    }

    public function isValid(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function getScheme(string $url): ?string
    {
        $parts = $this->parse($url);
        return $parts['scheme'] ?? null;
    }

    public function getHost(string $url): ?string
    {
        $parts = $this->parse($url);
        return $parts['host'] ?? null;
    }

    public function getPath(string $url): ?string
    {
        $parts = $this->parse($url);
        return $parts['path'] ?? null;
    }

    public function getQuery(string $url): ?string
    {
        $parts = $this->parse($url);
        return $parts['query'] ?? null;
    }
}