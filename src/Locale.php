<?php

namespace ConsistentPHP;

use IntlDateFormatter;

class Locale extends ConsistentBase {
    private array $translations = [];

    public function setLocale(string $locale): self {
        $this->value = setlocale(LC_ALL, $locale);
        return $this;
    }

    public function getLocale(): string {
        return $this->value;
    }

    public function loadTranslations(array $translations): self {
        $this->translations = array_merge($this->translations, $translations);
        return $this;
    }

    public function translate(string $message, array $parameters = []): string {
        $translation = $this->translations[$this->getLocale()][$message] ?? $message;

        foreach ($parameters as $key => $value) {
            $translation = str_replace('{' . $key . '}', $value, $translation);
        }

        return $translation;
    }

    public function formatDate(\DateTime $date, string $format): string {
        $formatter = new IntlDateFormatter(
            $this->getLocale(),
            IntlDateFormatter::MEDIUM,
            IntlDateFormatter::NONE,
            null,
            IntlDateFormatter::GREGORIAN,
            $format
        );
        return $formatter->format($date);
    }

    public function formatNumber(float $number, int $decimals = 2): string {
        $formatter = new \NumberFormatter($this->getLocale(), \NumberFormatter::DECIMAL);
        $formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS, $decimals);
        return $formatter->format($number);
    }
}